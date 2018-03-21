<?php

use Dotenv\Dotenv;

require_once '../vendor/autoload.php';

$dotenv = new Dotenv(__DIR__.'/..');
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

?>
<!DOCTYPE html>
<head>
    <title><?= $t->t('title') ?></title>
    <meta name="description"
          content="<?= $t->t('description') ?>"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

    </style>
</head>
<body>
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a><?= $t->t('header_title') ?></a>
                </li>
                <li><a href="index.php?l=hr"><img class="flag"
                                                  src="images/hr.jpg"/></a></li>
                <li><a href="index.php?l=en"><img class="flag"
                                                  src="images/en.jpg"/></a></li>
                <li><a style="text-decoration: underline"
                       href="https://github.com/bitfalls/m4c"><?= $t->t('callforhelp') ?></a>
                </li>
            </ul>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <br/><br/><br/>
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
                    <div class="panel-body" id="boxETHraised"
                         style="text-align: center;">
                        N/A
                    </div>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="panel panel-default">
                    <div class="panel-heading"
                         style="text-align: center;"><?= $t->t('eth_mined') ?></div>
                    <div class="panel-body" id="boxETHmined"
                         style="text-align: center;">
                        N/A
                    </div>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="panel panel-default">
                    <div class="panel-heading"
                         style="text-align: center;"><?= $t->t('eth_miners') ?></div>
                    <div class="panel-body" id="boxETHminers"
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
                    <div class="panel-body" id="boxUBQraised"
                         style="text-align: center;">
                        N/A
                    </div>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="panel panel-default">
                    <div class="panel-heading"
                         style="text-align: center;"><?= $t->t('ubq_mined') ?></div>
                    <div class="panel-body" id="boxUBQmined"
                         style="text-align: center;">
                        N/A
                    </div>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="panel panel-default">
                    <div class="panel-heading"
                         style="text-align: center;"><?= $t->t('ubq_miners') ?></div>
                    <div class="panel-body" id="boxUBQminers"
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
                    <div class="panel-body" id="boxVTCraised"
                         style="text-align: center;">
                        N/A
                    </div>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="panel panel-default">
                    <div class="panel-heading"
                         style="text-align: center;"><?= $t->t('vtc_mined') ?></div>
                    <div class="panel-body" id="boxVTCmined"
                         style="text-align: center;">
                        N/A
                    </div>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="panel panel-default">
                    <div class="panel-heading"
                         style="text-align: center;"><?= $t->t('vtc_miners') ?></div>
                    <div class="panel-body" id="boxVTCminers"
                         style="text-align: center;">
                        N/A
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row" id="data-panels">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#instructionsTab" data-toggle="tab"
                                  id="recentTab-link"><?= $t->t('tab1') ?></a>
            </li>
            <li><a href="#downloadTab" data-toggle="tab"
                   id="recentTab-link"><?= $t->t('tab3') ?></a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="instructionsTab"><br/>
                <div class="well">
                    <?= $t->t('tab1_text') ?>

                </div>
            </div>

            <div class="tab-pane" id="downloadTab"><br/>
                <div class="well">
                    <?= $t->t('tab2_text') ?>

                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <h3><?= $t->t('partners') ?></h3>
        <div class="owl-carousel owl-theme">
            <div class="item"><a target="_blank"
                                 href="http://digitalcalligraphy.hr"><img
                            style="width:220px;" src="images/dc.png"
                            alt="Digital Calliraphy"></a></div>
            <div class="item"><a target="_blank" href="http://bitfalls.com"><img
                            style="width:220px;" src="images/bf.png"
                            alt="Bitfalls"></a></div>
            <div class="item"><a target="_blank" href="http://nanopool.org"><img
                            style="width:220px;" src="images/np.png"
                            alt="nanopool"></a></div>
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
        'UBQ': '0xC0057917E1bB3C684F24E18a99eEF8B1E632944b'
      },
      'hr': {
        'ETH': '0xc39eA9DB33F510407D2C77b06157c3Ae57247c2A',
        'VTC': 'VsNpefSEA9nuNqcKQnxv6vkgofYWXkfNX9',
        'UBQ': '0xC0057917E1bB3C684F24E18a99eEF8B1E632944b'
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
      });

  }

  refresh();
  setInterval(refresh, 10000);

  $(document).ready(function () {
    var owl = $('.owl-carousel');
    owl.owlCarousel({
      items: 3,
      loop: true,
      margin: 10,
      autoplay: true,
      autoplayTimeout: 3000,
      autoplayHoverPause: true
    });
  });
</script>

<div id="footer">
    <div class="container">
    </div>
</div>


