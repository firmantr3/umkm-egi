
<!-- Footer ================================================================== -->
	<div  id="footerSection">
	<div class="container">
		<div class="row">
			<div class="span3">
				<h5>AKUN</h5>
				<a href="login.html">AKUN ANDA</a>
				<a href="login.html">INFORMASI PRIBADI</a> 
				<a href="login.html">ALAMAT</a> 
				<a href="login.html">DISKON</a>  
				<a href="login.html">RIWAYAT PEMESANAN</a>
			 </div>
			<div class="span3">
				<h5>INFORMASI</h5>
				<a href="contact.html">KONTAK</a>  
				<a href="{{ url('/register') }}">REGISTRASI</a>  
				<a href="legal_notice.html">LEGAL NOTICE</a>  
				<a href="tac.html">SYARAT DAN KETENTUAN</a> 
				<a href="faq.html">FAQ</a>
			 </div>
			<div class="span3">
				<h5>PRODUK</h5>
				<a href="{{ route('katalog') }}">KATALOG</a>  
				<a href="#">PRODUK BARU</a> 
				<a href="#">PALING LARIS</a>  
				<a href="#">PABRIKAN</a> 
				<a href="#">SUPPLIER</a> 
			 </div>
			<div id="socialMedia" class="span3 pull-right">
				<h5>SOCIAL MEDIA </h5>
				<a href="#"><img width="60" height="60" src="/customer/themes/images/facebook.png" title="facebook" alt="facebook"/></a>
				<a href="#"><img width="60" height="60" src="/customer/themes/images/twitter.png" title="twitter" alt="twitter"/></a>
				<a href="#"><img width="60" height="60" src="/customer/themes/images/youtube.png" title="youtube" alt="youtube"/></a>
			 </div> 
		 </div>
		<p class="pull-right">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
	</div><!-- Container End -->
	</div>
