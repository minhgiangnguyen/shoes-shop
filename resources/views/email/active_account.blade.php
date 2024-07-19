<div style="width:600px; margin: 0 auto">
    <div style="text-align: center">
        <h2>Xin chào {{ $User->name }}</h2>
        <p>Cảm ơn bạn đã đăng kí tài khoản tại hệ thống của Karma Shop</p>
        <p>Để có thể sử dụng tài khoản, bạn hãy vui lòng nhấn vào nút "kích hoạt" bên dưới để kích hoạt tài khoản.</p>
        <p>
            <a href="{{ route('show-actived', ['user' => $User->UserID, 'UserToken' => $User->UserToken]) }}" style="display:inline-block; background: green; color: #fff; padding: 7px 25px; font-weigdt: bold">
                Kích hoạt
            </a>
        </p>
    </div>
</div>