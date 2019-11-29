@extends('layout.maintenance')
@section('adsense')
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-5435102762324199",
        enable_page_level_ads: true
      });
    </script>
@stop


@section('content')

<section class="body-sign">
			<div class="center-sign">
				<a href="#" class="logo float-left">
					<img src="{{asset('/img/logo-rec.png')}}" height="54" alt="TeamWork Captcha" />
				</a>

				<div class="panel card-sign">
					<div class="card-title-sign mt-3 text-right">
						<h2 class="title text-uppercase font-weight-bold m-0"><i class="fas fa-user mr-1"></i> MAINTENANCE</h2>
					</div>
					<div class="card-body text-center">
						<h1>SITE UNDER MAINTENANCE</h1>

						<br>
						<br>
						<h3>My appologise for any inconvinience</h3>
						<h3>Keep calm and be possitive</h3>
						
					</div>
				</div>
			</div>
		</section>

@stop