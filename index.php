<?php
  
  $sliderSize = 50;
  $windowWidth = 100;
  
  $artifact['xray_under'] = "images/bones.jpg";
  $artifact['xray_over'] = "images/skin.jpg";
  $artifact['type']  = "xray";
  $info = getimagesize(realpath($artifact['xray_over']));
  $w = $info[0];
  $h = $info[1];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>X-Ray Effect Example</title>
    <link href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.4.33/example5/colorbox.min.css" rel="stylesheet" />
    <style>
    .xrayUpper {
      position: absolute;
      top: 0;
      left: 0;
      width: <?php echo $w;?>px;
      height: 490px;
      background: url(<?php echo $artifact['xray_over'];?>);
      background-position: top left;
    }
    
    .xraySlider {
      width: <?php echo $w;?>px;
      height: 15px;
      position:absolute;
      bottom:0;
      background:#CCC;
    }
    .ui-slider-handle {
      width:73px !important;
      height:73px !important;
      top:-28px !important;
      margin-left:-35px !important;
      border:0 !important;
      background:url(images/xray-sprite.png) no-repeat 0% 0% !important;
    }
    
    .ui-slider-handle:hover {
      background-position: 0 -73px !important;
    }

.xrayInner {
      width: 300px;
      height: 490px;
      position: absolute;
      background: url(http://s21.postimg.org/tpg6me1vb/bones.jpg) no-repeat;
      background-position: 0px 0px;
    }
.xrayWindow {
    width: <?php echo $windowWidth;?>px;
    height: <?php echo $h;?>px;
    border: 2px solid rgba(255,255,255,0.5);
    position: absolute;
    top: -1px;
    left: 0px;
    overflow: hidden;
}
.point {
    position: absolute;
    width: 15px;
    height: 15px;
    border-radius: 50%;
    background-color: red;
    cursor:pointer;
}
#xray-point0 {
    left: 150px;
    top: 30px;
}
#xray-point1 {
    left: 150px;
    top: 130px;
}

.point-data {
  display:none;
}

.point-wrap {
  padding:10px;
  text-align:justify;
}

.point-wrap h2 { text-align:center;margin-bottom:10px; }
    </style>
    <script src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script src="//code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.4.33/jquery.colorbox-min.js"></script>
  </head>
  <body>
<div class="artifact-hold" style="width:<?php echo $w;?>px;position:relative;margin:0 auto;padding:50px 0;">
  <div class="artifact <?php echo $artifact['type'];?>" style="position:relative;width:<?php echo $w;?>px;height:<?php echo ($h + $sliderSize);?>px;text-align:center;margin-bottom:50px;">
    <div class="xrayUpper"></div>
    <div class="xrayWindow">
      <div class="xrayInner">
        <div class="point" id="xray-point0">
          <div class="point-data">
            <div class="point-wrap">
              <h2>The Human Brain</h2>
              <p>The human brain has the same general structure as the brains of other mammals, but has a more developed cortex than any other. Large animals such as whales and elephants have larger brains in absolute terms, but when measured using the encephalization quotient which compensates for body size, the human brain is almost twice as large as the brain of the bottlenose dolphin, and three times as large as the brain of a chimpanzee. Much of the expansion comes from the part of the brain called the cerebral cortex, especially the frontal lobes, which are associated with executive functions such as self-control, planning, reasoning, and abstract thought. The portion of the cerebral cortex devoted to vision is also greatly enlarged in humans.</p>
              <p>The human cerebral cortex is a thick layer of neural tissue that covers most of the brain. This layer is folded in a way that increases the amount of surface that can fit into the volume available. The pattern of folds is similar across individuals, although there are many small variations. The cortex is divided into four "lobes", called the frontal lobe, parietal lobe, temporal lobe, and occipital lobe. (Some classification systems also include a limbic lobe and treat the insular cortex as a lobe.) Within each lobe are numerous cortical areas, each associated with a particular function such as vision, motor control, language, etc. The left and right sides of the cortex are broadly similar in shape, and most cortical areas are replicated on both sides. Some areas, though, show strong lateralization, particularly areas that are involved in language. In most people, the left hemisphere is "dominant" for language, with the right hemisphere playing only a minor role. There are other functions, such as spatiotemporal reasoning, for which the right hemisphere is usually dominant.</p>
            </div>
          </div>
        </div>
        <div class="point" id="xray-point1">
          <div class="point-data">
            <div class="point-wrap">
              <h2>The Human Heart</h2>
              <p>The human heart is a vital organ that functions as a pump, providing a continuous circulation of blood through the body, by way of the cardiac cycles. The heart is contained in the mediastinum in the thoracic cavity of the thorax.</p>
              <p>The heart is enclosed in a protective sac, the pericardium which also contains a lubricating pericardial fluid. The outer wall of the heart is made up of three layers, the epicardium, the myocardium which is the muscle of the heart, and the endocardium. The heart is divided into four main chambers: the two upper chambers are called the left atrium and the right atrium (plural atria) and the two lower chambers are called the right and the left ventricle. There is a dividing wall of muscle, called the septum, which separates the right side of the heart from the left side of the heart. The part of the septum that separates the ventricles, the ventricular septum is thicker than that which separates the atria, the atrial septum.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br />
    <div class="xraySlider"></div>
  </div>
  <?php //echo $card; ?>
</div>
<script>
  var artWidth = parseInt('<?php echo $w;?>');
  $(document).ready(function() {
    $('.xraySlider').slider({
      slide: function(e, ui) {
        var newLeft = (ui.value / 100) * (artWidth - parseInt('<?php echo $windowWidth;?>'));
        
        $('.xrayWindow').css({"left": newLeft + "px" });
        $('.xrayInner').css({"left": -newLeft + "px" });
      }
    });  
    $('.point').on('click', function() {
      var thisItem = $(this);
      $.colorbox({
        width:"800px",
        height:"600px",
        inline:true,
        href:thisItem.find('.point-data').html(),
        close:'',
        onComplete: function() {
          $.colorbox.resize();
        }
      });
    });
  });
</script>
  </body>
</html>
