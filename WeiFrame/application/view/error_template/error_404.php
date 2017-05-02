<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>error_404</title>
<style>
html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {
  margin: 0;
  padding: 0;
  border: 0;
  font-size: 100%;
  font: inherit;
  vertical-align: baseline;
  outline: none;
}
html { height: 100%; }
body { height: 100%; font-size: 62.5%; line-height: 1; font-family: Arial, Tahoma, Verdana, sans-serif; }

article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section { display: block; }
ol, ul { list-style: none; }

blockquote, q { quotes: none; }
blockquote:before, blockquote:after, q:before, q:after { content: ''; content: none; }
strong { font-weight: bold }
input { outline: none }
table {
    border-collapse: collapse;
    border-spacing: 0;
}
img {
    border: 0;
    max-width: 100%;
}
a { text-decoration: none }
a:hover { text-decoration: underline }
.clear { clear: both }
.clear:before,
.container:after {
    content: "";
    display: table;
}
.clear:after { clear: both }
/* IE 6/7 */
.clear { zoom: 1 }
body {
    background: #dfdfdf url(bg_noise.jpg) repeat;
    font-family: Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    overflow: hidden;
}

@font-face {
    font-family: 'TeXGyreScholaBold';
    src: url('texgyreschola-bold-webfont.eot');
    src: url('texgyreschola-bold-webfont.eot?#iefix') format('embedded-opentype'),
    url('texgyreschola-bold-webfont.ttf') format('truetype'),
    url('texgyreschola-bold-webfont.svg#TeXGyreScholaBold') format('svg');
    font-weight: normal;
    font-style: normal;

}
@-webkit-keyframes main { 
	0% {
	    -webkit-transform: scale3d(0.1, 0.1, 1);
	    opacity: 0;
	}
	45% {
	    -webkit-transform: scale3d(1.07, 1.07, 1);
	    opacity: 1;
	}
	70% { -webkit-transform: scale3d(0.95, 0.95, 1) }
	100% { -webkit-transform: scale3d(1, 1, 1) }
}

.clear { clear: both }
.clear:before,
.container:after {
    content: "";
    display: table;
}
.clear:after { clear: both }
.clear { zoom: 1 }
.left { float: left }
.right { float: right }

.logo {
    position: absolute;
    /*background: url(logo.png);*/
    width: 200px;
    height: 80px;
    top: 1%;
    left: 1%;
    z-index: 1;
    animation: logo 1.5s 1;
    -webkit-animation: logo 1.5s 1;
    -moz-animation: logo 1.5s 1;
    -o-animation: logo 1.5s 1;
    -ms-animation: logo 1.5s 1;
    transition: all 0.3s ease-in-out;
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
}
.logo:hover { opacity: .75 !important }
#main {
    position: relative;
    width: 600px;
    margin: 0 auto;
    padding-top: 12%;
    animation: main .8s 1;
    animation-fill-mode: forwards;
    -webkit-animation: main .8s 1;
    -webkit-animation-fill-mode: forwards;
    -moz-animation: main .8s 1;
    -moz-animation-fill-mode: forwards;
    -o-animation: main .8s 1;
    -o-animation-fill-mode: forwards;
    -ms-animation: main .8s 1;
    -ms-animation-fill-mode: forwards;
}
#main #header h1 {
    position: relative;
    display: block;
    font: 72px 'TeXGyreScholaBold', Arial, sans-serif;
    color: #0061a5;
    text-shadow: 2px 2px #f7f7f7;
    text-align: center;
}
#main #header h1 span.sub {
    position: relative;
    font-size: 21px;
    top: -20px;
    padding: 0 10px;
    font-style: italic;
}
#main #header h1 span.icon {
    position: relative;
    display: inline-block;
    top: -6px;
    margin: 0 10px 5px 0;
    background: #0061a5;
    width: 50px;
    height: 50px;
    -moz-box-shadow: 1px 2px white;
    -webkit-box-shadow: 1px 2px white;
    box-shadow: 1px 2px white;
    -webkit-border-radius: 50px;
    -moz-border-radius: 50px;
    border-radius: 50px;
    color: #dfdfdf;
    font-size: 46px;
    line-height: 48px;
    font-weight: bold;
    text-align: center;
    text-shadow: 0 0;
}
#main #content {
    position: relative;
    width: 600px;
    background: white;
    -moz-box-shadow: 0 0 0 3px #ededed inset, 0 0 0 1px #a2a2a2, 0 0 20px rgba(0,0,0,.15);
    -webkit-box-shadow: 0 0 0 3px #ededed inset, 0 0 0 1px #a2a2a2, 0 0 20px rgba(0,0,0,.15);
    box-shadow: 0 0 0 3px #ededed inset, 0 0 0 1px #a2a2a2, 0 0 20px rgba(0,0,0,.15);
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    z-index: 5;
}
#main #content h2 {
    background: url(404_s-divider.jpg) no-repeat;
    background-position: bottom;
    padding: 12px 0 22px 40px;
    font: 20px 'TeXGyreScholaRegular', Arial, sans-serif;
    color: #8e8e8e;
    /*text-align: center;*/
}

</style>
</head>
<body>
<div id="wrapper"><a class="logo" href="/"></a>
  <div id="main">
    <header id="header">
      <h1><span class="icon">!</span><?=$status_code?><span class="sub"><?=$heading?></span></h1>
    </header>
    <div id="content">
      <h2><?=$message?></h2>
    </div>
    </div>
  </div>
</div>
</html>