<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>error_php</title>
<style>
html, body, div, span, h1, h2, h3, h4, h5, h6, p {
  margin: 0;
  padding: 0;
  border: 0;
  font-size: 100%;
  font: inherit;
  vertical-align: baseline;
  outline: none;
}

body {
    background: rgba(244,244,244,0.5);
}

.logo {
    position: absolute;
    width: 200px;
    height: 80px;
    top: 1%;
    left: 1%;
    z-index: 1;
}
#main {
    position: relative;
    width: 800px;
    margin: 0 auto;
    padding-top: 12%;
}
#main #header h1 {
    position: relative;
    display: block;
    font: 54px 'TeXGyreScholaBold', Arial, sans-serif;
    color: #33b2ef;
    text-shadow: 2px 2px #f7f7f7;
    text-align: center;
}
#main #header h1 span.sub {
    position: relative;
    font-size: 24px;
    top: -20px;
    padding: 0 10px;
    font-style: italic;
}
#main #header h1 span.icon {
    position: relative;
    display: inline-block;
    top: -6px;
    margin: 0 10px 5px 0;
    background: #33b2ef;
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
    width: 800px;
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
    padding: 12px 0 22px 16px;
    font: 18px Arial;
    line-height: 40px;
    /*text-align: center;*/
}
#main #content h2 .title{
    font: 22px Arial;
    font-family: inherit;
    font-weight: 500;
    color: inherit;
}
#main #content h2 .message{
    font: 16px Arial;
    color: #666;
    line-height: 40px;
    padding-left:20px;
}

</style>
</head>
<body>
<div id="wrapper"><a class="logo" href="/"></a>
    <div id="main">
        <header id="header">
          <h1><span class="icon">!</span><?=$severity?><span class="sub"></span></h1>
        </header>
        <div id="content">
            <h2>
                <p class="title">Error Message :</p>
                <p class="message"><?php echo "[$severity] $errstr";?></p>
                <p class="message"><?php echo "Error on line $errline in $errfile"?></p>
            </h2>
        </div>
    </div>
</div>
</html>