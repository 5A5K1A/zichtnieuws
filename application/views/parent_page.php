<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="nl">
	<head>
		<meta charset="utf-8">

		<title>Ons Zicht op het nieuws</title>

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Ons Zicht op het nieuws">
		<meta name="author" content="Saskia Bouten">

		<link rel="icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
	</head>
	<body onload="iframeLoaded();">
		<nav>
			<ul>
				<li class="nav-item"><a href="/?id=123">Nieuws</a></li>
				<li class="nav-item"><a href="/?id=456">Over</a></li>
				<li class="nav-item"><a href="/?id=789">Cases</a></li>
				<li class="nav-item"><a href="https://5a5k1a.github.io/">Contact</a></li>
			</ul>
		</nav>

		<header>
			<div class="container">
				<h1>Ons Zicht op het nieuws</h1>
			</div>
		</header>

		<main>
			<div class="container">
				<article>
					<h2>Nieuwstitel <?php echo $post_id; ?></h2>
					<p>Lorem ipsum dolor sit amet, eam te odio paulo perfecto, his vitae antiopam ad, ut error nostrum sadipscing eum. Nihil vocent suscipit ad mea, cu velit summo pro, eos in tritani percipit. Debet partiendo torquatos et pri. Officiis consequat gloriatur mel ei, at nonumes mediocritatem sit.</p>
					<blockquote>Case dignissim qui at, vis an decore dolorum sententiae, at affert expetendis eam. Quot fabulas ut duo, in utamur aperiam inciderint his, ius id vitae ignota labore.</blockquote>
					<p>Audiam intellegat ius an, duis timeam maiorum ius et, eos no sensibus theophrastus. Ex forensibus omittantur qui, vel zril urbanitas cu. In alia oratio urbanitas mel. Page rendered in {elapsed_time} seconds.</p>
					<iframe class="frame" src="<?php echo $frame_url; ?>">

					</iframe>
				</article>
			</div>
		</main>

		<footer>
			<p><?php echo $copyright; ?></p>
		</footer>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/script.js"></script>
	</body>
</html>
