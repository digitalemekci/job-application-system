<div>
    <form wire:submit.prevent="register">
        <input type="text" wire:model="name" placeholder="Ad Soyad">
        <input type="email" wire:model="email" placeholder="E-posta">
        <input type="password" wire:model="password" placeholder="Şifre">
        <input type="password" wire:model="password_confirmation" placeholder="Şifre tekrar">
        <button type="submit">Kayıt Ol</button>
    </form>
</div>
