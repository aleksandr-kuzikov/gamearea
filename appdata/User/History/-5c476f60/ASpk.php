<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style>
		body {
			padding: 100px;
		}

		form {
			--docsearch-text-color: #1c1e21;
			--docsearch-spacing: 12px;
			--docsearch-icon-stroke-width: 1.4;
			--docsearch-highlight-color: var(--docsearch-primary-color);
			--docsearch-muted-color: #969faf;
			--docsearch-container-background: rgba(101,108,133,0.8);
			--docsearch-modal-width: 560px;
			--docsearch-modal-height: 600px;
			--docsearch-modal-background: #f5f6f7;
			--docsearch-modal-shadow: inset 1px 1px 0 0 hsla(0,0%,100%,0.5),0 3px 8px 0 #555a64;
			--docsearch-searchbox-height: 56px;
			--docsearch-searchbox-background: #ebedf0;
			--docsearch-searchbox-focus-background: #fff;
			--docsearch-searchbox-shadow: inset 0 0 0 2px var(--docsearch-primary-color);
			--docsearch-hit-height: 56px;
			--docsearch-hit-color: #444950;
			--docsearch-hit-active-color: #fff;
			--docsearch-hit-background: #fff;
			--docsearch-hit-shadow: 0 1px 3px 0 #d4d9e1;
			--docsearch-key-gradient: linear-gradient(-225deg,#d5dbe4,#f8f8f8);
			--docsearch-key-shadow: inset 0 -2px 0 0 #cdcde6,inset 0 0 1px 1px #fff,0 1px 2px 1px rgba(30,35,90,0.4);
			--docsearch-footer-height: 44px;
			--docsearch-footer-background: #fff;
			--docsearch-footer-shadow: 0 -1px 0 0 #e0e3e8,0 -3px 6px 0 rgba(69,98,155,0.12);
			--bs-blue: #0d6efd;
			--bs-indigo: #6610f2;
			--bs-purple: #6f42c1;
			--bs-pink: #d63384;
			--bs-red: #dc3545;
			--bs-orange: #fd7e14;
			--bs-yellow: #ffc107;
			--bs-green: #198754;
			--bs-teal: #20c997;
			--bs-cyan: #0dcaf0;
			--bs-black: #000;
			--bs-white: #fff;
			--bs-gray: #6c757d;
			--bs-gray-dark: #343a40;
			--bs-gray-100: #f8f9fa;
			--bs-gray-200: #e9ecef;
			--bs-gray-300: #dee2e6;
			--bs-gray-400: #ced4da;
			--bs-gray-500: #adb5bd;
			--bs-gray-600: #6c757d;
			--bs-gray-700: #495057;
			--bs-gray-800: #343a40;
			--bs-gray-900: #212529;
			--bs-primary: #0d6efd;
			--bs-secondary: #6c757d;
			--bs-success: #198754;
			--bs-info: #0dcaf0;
			--bs-warning: #ffc107;
			--bs-danger: #dc3545;
			--bs-light: #f8f9fa;
			--bs-dark: #212529;
			--bs-primary-rgb: 13,110,253;
			--bs-secondary-rgb: 108,117,125;
			--bs-success-rgb: 25,135,84;
			--bs-info-rgb: 13,202,240;
			--bs-warning-rgb: 255,193,7;
			--bs-danger-rgb: 220,53,69;
			--bs-light-rgb: 248,249,250;
			--bs-dark-rgb: 33,37,41;
			--bs-white-rgb: 255,255,255;
			--bs-black-rgb: 0,0,0;
			--bs-body-color-rgb: 33,37,41;
			--bs-body-bg-rgb: 255,255,255;
			--bs-font-sans-serif: system-ui,-apple-system,"Segoe UI",Roboto,"Helvetica Neue","Noto Sans","Liberation Sans",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
			--bs-font-monospace: SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;
			--bs-gradient: linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0));
			--bs-body-font-family: var(--bs-font-sans-serif);
			--bs-body-font-size: 1rem;
			--bs-body-font-weight: 400;
			--bs-body-line-height: 1.5;
			--bs-body-color: #212529;
			--bs-body-bg: #fff;
			--bs-border-width: 1px;
			--bs-border-style: solid;
			--bs-border-color: #dee2e6;
			--bs-border-color-translucent: rgba(0, 0, 0, 0.175);
			--bs-border-radius: 0.375rem;
			--bs-border-radius-sm: 0.25rem;
			--bs-border-radius-lg: 0.5rem;
			--bs-border-radius-xl: 1rem;
			--bs-border-radius-2xl: 2rem;
			--bs-border-radius-pill: 50rem;
			--bs-heading-color: ;
			--bs-link-color: #0d6efd;
			--bs-link-hover-color: #0a58ca;
			--bs-code-color: #d63384;
			--bs-highlight-bg: #fff3cd;
			--bd-purple: #4c0bce;
			--bd-violet: #712cf9;
			--bd-accent: #ffe484;
			--bd-violet-rgb: 112.520718,44.062154,249.437846;
			--bd-accent-rgb: 255,228,132;
			--bd-pink-rgb: 214,51,132;
			--bd-teal-rgb: 32,201,151;
			--docsearch-primary-color: var(--bd-violet);
			--docsearch-logo-color: var(--bd-violet);
			--base00: #fff;
			--base01: #f5f5f5;
			--base02: #c8c8fa;
			--base03: #565c64;
			--base04: #030303;
			--base05: #333;
			--base06: #fff;
			--base07: #9a6700;
			--base08: #bc4c00;
			--base09: #087990;
			--base0A: #795da3;
			--base0B: #183691;
			--base0C: #183691;
			--base0D: #795da3;
			--base0E: #a71d5d;
			--base0F: #333;
			font-family: var(--bs-body-font-family);
			font-size: var(--bs-body-font-size);
			font-weight: var(--bs-body-font-weight);
			line-height: var(--bs-body-line-height);
			color: var(--bs-body-color);
			text-align: var(--bs-body-text-align);
			-webkit-text-size-adjust: 100%;
			-webkit-tap-highlight-color: transparent;
			--bs-gutter-y: 0;
			--bs-gutter-x: 3rem;
			box-sizing: border-box;
			position: relative;
			padding: var(--bd-example-padding);
			--bd-example-padding: 1.5rem;
			border-top-left-radius: var(--bs-border-radius);
			border-top-right-radius: var(--bs-border-radius);
			margin: 0;
			border: 0;
		}
	</style>

	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h1>Book Viewer</h1>

		<form action="">
			<div class="input-group">
				<input type="file" class="form-control" aria-label="Upload">
				<button class="btn btn-outline-secondary" type="button">Загрузить</button>
			</div>
		</form>

	</div>
</body>
</html>
