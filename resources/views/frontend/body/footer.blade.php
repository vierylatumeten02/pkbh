@php
$allfooter = App\Models\Footer::find(1);
@endphp

<footer class="footer" id="footer">
        <div class="footer-content">
            <div class="footer-social">
                <div class="social-title"><p>Media Sosial</p></div>
            <div class="social-icon">
            <a href="{{ $allfooter->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="{{ $allfooter->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="{{ $allfooter->whatsapp }}" target="_blank"><i class="fab fa-whatsapp"></i></a>
            </div>    
        </div>
            <div class="footer-business">
                <p>Email: {{ $allfooter->email }}</p>
                <p>{{ $allfooter->address }}</p>
                <p><script>document.write(new Date().getFullYear())</script> &copy; {{ $allfooter->copyright }}</p>
            </div>
        </div>

        <a href=" " class="scrollToTop"><i class="las la-long-arrow-alt-up"></i></a>
    </footer>