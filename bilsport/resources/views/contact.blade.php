@extends('layouts.app')

@section('title', 'Hubungi Kami')

@section('content')
<div style="padding: 50px 10%; background: #f8f9fa; min-height: 80vh;">
    <div style="max-width: 600px; margin: 0 auto; background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); text-align: center;">
        <h1 style="color: maroon; margin-bottom: 10px;">Hubungi Kami</h1>
        <p style="color: #777; margin-bottom: 30px;">Punya pertanyaan? Kami siap membantu Anda!</p>
        
        <div style="text-align: left; margin-bottom: 20px;">
            <p><strong>📍 Alamat:</strong> Jl. Kalimantan No. 37, Kampus Tegalboto, Jember</p>
            <p><strong>📞 WhatsApp:</strong> +62 812-3456-7890</p>
            <p><strong>📧 Email:</strong> support@bilsport-jember.com</p>
        </div>

        <hr style="border: 0; border-top: 1px solid #eee; margin: 30px 0;">

        <form>
            <input type="text" placeholder="Nama Anda" style="width: 100%; padding: 12px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 8px;">
            <textarea placeholder="Pesan Anda" rows="4" style="width: 100%; padding: 12px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 8px;"></textarea>
            <button type="button" style="background: maroon; color: white; border: none; padding: 12px 30px; border-radius: 8px; cursor: pointer; width: 100%;">Kirim Pesan</button>
        </form>
    </div>
</div>
@endsection