<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>404 Page Not Found</title>
<style>
body {
	margin: 0;
	padding: 0;
	font-size: 13px;
	color: #5d5d5d;
	background-color: #ffffff;
	font-weight: 400;
	font-family: "Poppins", sans-serif;
}
.page_not_found {
    position: fixed;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    text-align: center;
}
.page_not_found:before {
    content: "";
    height: 100%;
    width: 0.0001px;
    display: inline-block;
    vertical-align: middle;
}
.page_not_found .page_not_found_box {
    display: inline-block;
    vertical-align: middle;
}
.page_not_found .page_not_found_box h1 {
    font-size: 86px;
    line-height: 70px;
    margin: 0 0 10px;
    color: #4169e1;
}
.page_not_found .page_not_found_box h1 svg {
    margin: 0 6px;
}
.page_not_found .page_not_found_box h2 {
    font-size: 30px;
    color: #222222;
    text-transform: capitalize;
    margin: 0;
}
.page_not_found .page_not_found_box p {
    margin: 0;
}
.page_not_found .page_not_found_box a {
    border: none;
    height: 50px;
    min-width: 200px;
    line-height: 50px;
    text-align: center;
    border-radius: 5px;
    background: #4169e1;
    color: #ffffff;
    font-size: 13px;
    font-weight: 600;
    transition: all 0.3s;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    cursor: pointer;
    display: inline-block;
    text-decoration: none;
    margin-top: 25px;
}
.page_not_found .page_not_found_box a:hover {
    box-shadow: 0 10px 30px -11px #4169e1;
    color: #ffffff;
}
</style>
</head>
<body>
	<div id="container" class="page_not_found">
		<div class="page_not_found_box">
			<h1>4<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="70" height="70"> <circle style="fill:#FFD93B;" cx="256" cy="256" r="256"/><path style="fill:#F4C534;" d="M512,256c0,141.44-114.64,256-256,256c-80.48,0-152.32-37.12-199.28-95.28 c43.92,35.52,99.84,56.72,160.72,56.72c141.36,0,256-114.56,256-256c0-60.88-21.2-116.8-56.72-160.72 C474.8,103.68,512,175.52,512,256z"/><path style="fill:#3E4347;" d="M332.432,384.8c0,7.472-5.968,13.328-13.328,13.328H192.912c-7.36,0-13.328-5.872-13.328-13.328 c0-7.36,5.968-13.328,13.328-13.328h126.192C326.448,371.472,332.432,377.44,332.432,384.8z"/><path style="fill:#3E4347;" d="M111.808,261.68c6.256-3.68,24.768,16.16,53.84,17.248c30.096,1.12,47.584-20.928,53.84-17.248 c7.792,2.672-2.832,53.552-53.84,53.744C114.656,315.232,104.016,264.352,111.808,261.68z"/><path style="fill:#E9B02C;" d="M99.808,239.312c-5.808-0.928-9.776-6.4-8.832-12.224c0.944-5.808,6.32-9.792,12.224-8.832 c59.968,9.632,78.192-33.2,78.368-33.632c2.208-5.456,8.416-8.08,13.904-5.856c5.456,2.224,8.08,8.448,5.856,13.904 C189.296,222.144,151.504,247.616,99.808,239.312z"/><path style="fill:#3E4347;" d="M400.192,261.68c-6.256-3.68-24.768,16.16-53.84,17.248c-30.096,1.12-47.584-20.928-53.84-17.248 c-7.792,2.672,2.832,53.552,53.84,53.744C397.344,315.232,407.984,264.352,400.192,261.68z"/> <path style="fill:#E9B02C;" d="M310.672,192.656c-2.224-5.456,0.4-11.68,5.856-13.904c5.44-2.224,11.648,0.384,13.888,5.808 c0.8,1.92,19.12,43.216,78.384,33.696c5.872-0.96,11.296,3.024,12.224,8.832c0.928,5.824-3.024,11.296-8.832,12.224 C360.864,247.568,322.8,222.4,310.672,192.656z"/></svg>4</h1>
			<h2>Page not found 
				
			</h2>
			<p>The page you requested was not found.</p>			
			<a href="https://pushbutton-vip.com/">Back to Home</a>
		</div>
	</div>
</body>
</html>