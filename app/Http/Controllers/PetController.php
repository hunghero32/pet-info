<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Http\Requests\StorePetRequest;
use App\Http\Requests\UpdatePetRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

class PetController extends Controller
{
    public function __construct()
    {
        // Áp dụng policy cho các route resource
        $this->authorizeResource(Pet::class, 'pet');
    }

    /**
     * Danh sách thú cưng
     */
    public function index()
    {
        $pets = Auth::user()->role === 'admin' || Auth::user()->role === 'staff'
            ? Pet::all()
            : Auth::user()->pets;

        return view('pets.index', compact('pets'));
    }

    /**
     * Form thêm thú cưng
     */
    public function create()
    {
        return view('pets.create');
    }

    /**
     * Lưu thú cưng mới
     */
    public function store(StorePetRequest $request)
    {
        Auth::user()->pets()->create([
            ...$request->validated(),
            'public_id' => Str::uuid(),
            'is_lost'   => false,
        ]);
        // Đường dẫn public (nếu dùng "php artisan storage:link")
        $path = 'qrcodes/' . $pet->id . '.png';

        // Tạo file QR code
        $qr = QrCode::format('png')
            ->size(200)
            ->generate(url('/pets/' . $pet->id));

        Storage::disk('public')->put($path, $qr);

        return redirect()->route('pets.index')->with('success', 'Thêm thú cưng thành công!');
    }

    /**
     * Xem chi tiết thú cưng
     */
    public function show(Pet $pet)
    {
        return view('pets.show', compact('pet'));
    }

    /**
     * Form chỉnh sửa
     */
    public function edit(Pet $pet)
    {
        return view('pets.edit', compact('pet'));
    }

    /**
     * Cập nhật thú cưng
     */
    public function update(UpdatePetRequest $request, Pet $pet)
    {
        $pet->update($request->validated());

        return redirect()->route('pets.index')->with('success', 'Cập nhật thú cưng thành công!');
    }

    /**
     * Xóa thú cưng
     */
    public function destroy(Pet $pet)
    {
        $pet->delete();

        return redirect()->route('pets.index')->with('success', 'Xóa thú cưng thành công!');
    }

    /**
     * Trang hồ sơ công khai (ai quét QR cũng vào được)
     */
    public function publicProfile($public_id)
    {
        $pet = Pet::where('public_id', $public_id)->firstOrFail();

        return view('pets.public', compact('pet'));
    }

    /**
     * Tải QR code của thú cưng
     */
    public function downloadQr($public_id)
    {
        $pet = Pet::where('public_id', $public_id)->firstOrFail();

        $qr = QrCode::format('png')->size(300)->generate($pet->public_url);

        return response($qr)
            ->header('Content-Type', 'image/png')
            ->header('Content-Disposition', 'attachment; filename="pet-qr.png"');
    }

    /**
     * Báo thất lạc / Hủy thất lạc
     */
    public function reportLost(Pet $pet)
    {
        $this->authorize('update', $pet);

        $pet->update(['is_lost' => !$pet->is_lost]);

        // Nếu báo thất lạc thì gửi email thông báo
        if ($pet->is_lost) {
            Mail::raw(
                "Thú cưng {$pet->name} đã được báo thất lạc. Vui lòng kiểm tra hồ sơ công khai!",
                function ($msg) use ($pet) {
                    $msg->to($pet->owner->email)
                        ->subject("Cảnh báo: {$pet->name} đã thất lạc!");
                }
            );
        }

        return redirect()->route('pets.index')->with('success', 'Cập nhật trạng thái thất lạc!');
    }
}
