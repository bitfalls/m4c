<?php

use Dotenv\Dotenv;

require_once '../vendor/autoload.php';

$dotenv = new Dotenv(__DIR__ . '/..');
$dotenv->load();

use DElfimov\Translate\Translate;
use DElfimov\Translate\Loader\PhpFilesLoader;

$languages = ['en', 'hr'];
$default   = $languages[0];

$t = new Translate(
    new PhpFilesLoader(__DIR__ . "/../messages"),
    [
        "default"   => $default,
        "available" => $languages,
    ]
);

$l = $_GET['l'] ?? null;
if ( ! in_array($l, $languages)) {
    $l = $default;
}

$t->setLanguage($l);

//force tab open
$tab = $_GET['t'] ?? null;


?>
<!DOCTYPE html>
<head>
    <title><?= $t->t('title') ?></title>
    <meta name="description"
          content="<?= $t->t('description') ?>"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<meta property="og:url" content="http://mining4charity.eu/"/>
	<meta property="og:title" content="Mining4Charity"/>
	<meta property="og:description" content="Mining for charity"/>
	<meta property="og:image" content="http://mining4charity.eu/images/m4c_logo.png"/>
	<meta property="og:image:alt" content="Mining for charity"/>
	
	<link rel="shortcut icon" type="image/png" href="/favicon.png"/>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"
          rel="stylesheet">
    <link href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css"
          rel="stylesheet">
    <link href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css"
          rel="stylesheet">


    <style>
        #recent-blocks tr {
            transition: 1s;
        }

        #recent-blocks td > span {
            min-width: 2.5em;
            display: inline-block;
            text-align: right;
        }

        #recent-blocks td > span + span {
            margin-left: 3em;
            min-width: 4em;
            font-style: italic;
            color: #aaa;
        }

        @media (max-width: 991px) {
            #recent-blocks td > span + span {
                display: none;
            }
        }

        .flag {
            height: 20px;
        }
		
		.partner {
			float:left;
			padding-right:35px;
		}

    </style>
</head>
<body>
    
<div class="container">
	<nav class="navbar navbar-default">
		<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><?= $t->t('header_title') ?></a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="index.php?l=hr"><img class="flag" src="images/hr.jpg"/></a></li>
					<li><a href="index.php?l=en"><img class="flag" src="images/en.jpg"/></a></li>
					<li><a style="text-decoration: underline" href="https://github.com/bitfalls/m4c"><?= $t->t('callforhelp') ?></a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
</div>


<div class="container">
    <div class="row">
        <table align="center">
            <tr>
                <td></td>
                <td vertical-align="center">
                    <a href="index.php"><img src="images/m4c_logo.png"
                                             alt="Mining for charity"
                                             style="width:200px;"></a>
                </td>
            </tr>
        </table>
    </div>

    <br/>


    <div class="row" style="margin: 0 -30px 0 -30px" id="ticker-panels">
        <div class="col-md-6" style="padding:0">
            <div class="col-xs-4">
                <div class="panel panel-default">
                    <div class="panel-heading"
                         style="text-align: center;"><?= $t->t('eth_raised') ?></div>
                    <div class="panel-body box" id="boxETHraised"
                         style="text-align: center;">
                        N/A
                    </div>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="panel panel-default">
                    <div class="panel-heading"
                         style="text-align: center;"><?= $t->t('eth_mined') ?></div>
                    <div class="panel-body box" id="boxETHmined"
                         style="text-align: center;">
                        N/A
                    </div>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="panel panel-default">
                    <div class="panel-heading"
                         style="text-align: center;"><?= $t->t('eth_miners') ?></div>
                    <div class="panel-body box" id="boxETHminers"
                         style="text-align: center;">
                        N/A
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6" style="padding:0">
            <div class="col-xs-4">
                <div class="panel panel-default">

                    <div class="panel-heading"
                         style="text-align: center;"><?= $t->t('ubq_raised') ?></div>
                    <div class="panel-body box" id="boxUBQraised"
                         style="text-align: center;">
                        N/A
                    </div>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="panel panel-default">
                    <div class="panel-heading"
                         style="text-align: center;"><?= $t->t('ubq_mined') ?></div>
                    <div class="panel-body box" id="boxUBQmined"
                         style="text-align: center;">
                        N/A
                    </div>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="panel panel-default">
                    <div class="panel-heading"
                         style="text-align: center;"><?= $t->t('ubq_miners') ?></div>
                    <div class="panel-body box" id="boxUBQminers"
                         style="text-align: center;">
                        N/A
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6" style="padding:0">
            <div class="col-xs-4">
                <div class="panel panel-default">
                    <div class="panel-heading"
                         style="text-align: center;"><?= $t->t('vtc_raised') ?></div>
                    <div class="panel-body box" id="boxVTCraised"
                         style="text-align: center;">
                        N/A
                    </div>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="panel panel-default">
                    <div class="panel-heading"
                         style="text-align: center;"><?= $t->t('vtc_mined') ?></div>
                    <div class="panel-body box" id="boxVTCmined"
                         style="text-align: center;">
                        N/A
                    </div>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="panel panel-default">
                    <div class="panel-heading"
                         style="text-align: center;"><?= $t->t('vtc_miners') ?></div>
                    <div class="panel-body box" id="boxVTCminers"
                         style="text-align: center;">
                        N/A
                    </div>
                </div>
            </div>
        </div>
		<div class="col-md-6" style="padding:0">
            <div class="col-xs-4">
                <div class="panel panel-default">
                    <div class="panel-heading"
                         style="text-align: center;"><?= $t->t('btc_raised') ?></div>
                    <div class="panel-body box" id="boxBTCraised"
                         style="text-align: center;">
                        N/A
                    </div>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="panel panel-default">
                    <div class="panel-heading"
                         style="text-align: center;"><?= $t->t('btc_mined') ?></div>
                    <div class="panel-body box" id="boxBTCmined"
                         style="text-align: center;">
                        N/A
                    </div>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="panel panel-default">
                    <div class="panel-heading"
                         style="text-align: center;"><?= $t->t('btc_miners') ?></div>
                    <div class="panel-body box" id="boxBTCminers"
                         style="text-align: center;">
                        N/A
                    </div>
                </div>
            </div>
        </div>

        <div class="panel col-md-12 col-xs-12" style="text-align: center">
            <div class="panel-body">
            <h3><?= $t->t('collected'); ?>: <span id="collected">N/A</span></h3>
            </div>
        </div>
    </div>

    <div style="text-align: center;">
        <a style="display: block;" href="<?= $t->t('piclink'); ?>"><img src="<?= $t->t('picsource') ?>" alt="<?= $t->t('piclink'); ?>"></a>
    </div>

    <div class="row" id="data-panels">
        <ul class="nav nav-tabs">
            <li <?= (($tab == null) ? 'class="active"' : '') ?> ><a href="#instructionsTab" data-toggle="tab"
                                  id="recentTab-link"><?= $t->t('tab1') ?></a>
            </li>
            <li <?= ($tab == "dl" ? 'class="active"' : '') ?> ><a href="#downloadTab" data-toggle="tab"
                   id="recentTab-link"><?= $t->t('tab3') ?></a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane  <?= ($tab == null ? "active" : "") ?>" id="instructionsTab"><br/>
                <div class="well">
                    <?= $t->t('tab1_text') ?>

                </div>
            </div>

            <div class="tab-pane <?= ($tab == "dl" ? "active" : "") ?>" id="downloadTab"><br/>
                <div class="well">
                    <?= $t->t('tab2_text') ?>

                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <h3><?= $t->t('partners') ?></h3>
        <div>
            <div class="item partner"><a target="_blank"
                                 href="http://digitalcalligraphy.hr"><img
                            style="width:220px;" src="images/dc.png"
                            alt="Digital Calliraphy"></a></div>
            <div class="item partner"><a target="_blank"
                                 href="https://bitfalls.com/<?php echo ($t->getLanguage() == 'hr') ? 'hr/' : '' ?>2018/03/22/mining-for-charity-temporarily-redirect-your-hashpower-to-help-those-in-need/"><img
                            style="width:220px;" src="images/bf.png"
                            alt="Bitfalls"></a></div>
            <div class="item partner"><a target="_blank" href="http://nanopool.org"><img
                            style="width:220px;" src="images/np.png"
                            alt="nanopool"></a></div>
			<div class="item partner"><a target="_blank" href="http://provoco.me"><img
                            style="width:220px;" src="images/provoco.png"
                            alt="provoco"></a></div>
        </div>
    </div>


</div>

<script src="js/all.js"></script>

<script>

  function refresh() {

    const addresses = {
      'en': {
        'ETH': '0xc39eA9DB33F510407D2C77b06157c3Ae57247c2A',
        'VTC': 'VsNpefSEA9nuNqcKQnxv6vkgofYWXkfNX9',
        'UBQ': '0xC0057917E1bB3C684F24E18a99eEF8B1E632944b',
        'BTC': '12o1KVeYig3i5JczvohZhYDcAKaS9LsWc5'
      },
      'hr': {
        'ETH': '0xc39eA9DB33F510407D2C77b06157c3Ae57247c2A',
        'VTC': 'VsNpefSEA9nuNqcKQnxv6vkgofYWXkfNX9',
        'UBQ': '0xC0057917E1bB3C684F24E18a99eEF8B1E632944b',
        'BTC': '12o1KVeYig3i5JczvohZhYDcAKaS9LsWc5'
      }
    };

    $.ajax({
      method: "POST",
      url: "api.php",
      data: JSON.stringify(addresses['<?= $t->getLanguage() ?>'])
    })
      .done(function (resp) {

        for (var ticker in resp) {
          if (resp.hasOwnProperty(ticker)) {
            for (var type in resp[ticker]) {
              if (resp[ticker].hasOwnProperty(type)) {
                var value = resp[ticker][type];
                $("#" + 'box' + ticker + type).text(value);
              }
            }
          }
        }

        getAmountValue();
      });

  }

  function getAmountValue() {
    var sum = 0;
    $.get('https://min-api.cryptocompare.com/data/pricemulti?fsyms=BTC,ETH,VTC,UBQ&tsyms=USD').done(function(resp){

      $(".box").each(function(e, b){
        boxId = $(b).attr('id');
        if (boxId.indexOf('raised') > -1 || boxId.indexOf('mined') > -1) {
          var ticker = boxId.replace('box', '').replace('raised', '').replace('mined', '');
          var amount = parseFloat(b.innerText) * resp[ticker]['USD'];
          if (amount > 0) {
            sum += amount;
          }
        }
      });
      $("#collected").text("$"+parseFloat(Math.round(sum * 100) / 100).toFixed(2));
    });
  }

  refresh();
  setInterval(refresh, 10000);

</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-106217299-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-106217299-3');
</script>


<div id="footer">
    <div class="container">
    </div>
</div>


