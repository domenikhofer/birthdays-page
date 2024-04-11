var confetti = {
    maxCount: 150,
    speed: 2,
    frameInterval: 15,
    alpha: 1,
    gradient: !1,
    start: null,
    stop: null,
    toggle: null,
    pause: null,
    resume: null,
    togglePause: null,
    remove: null,
    isPaused: null,
    isRunning: null
  };
  !(function () {
    (confetti.start = c),
      (confetti.stop = w),
      (confetti.toggle = function () {
        e ? w() : c();
      }),
      (confetti.pause = u),
      (confetti.resume = m),
      (confetti.togglePause = function () {
        i ? m() : u();
      }),
      (confetti.isPaused = function () {
        return i;
      }),
      (confetti.remove = function () {
        stop(), (i = !1), (a = []);
      }),
      (confetti.isRunning = function () {
        return e;
      });
    var t =
        window.requestAnimationFrame ||
        window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        window.oRequestAnimationFrame ||
        window.msRequestAnimationFrame,
      n = [
        "rgba(246 172 162,",
        "rgba(244, 155, 144,",
        "rgba(242, 139, 125,",
        "rgba(162, 246, 172,",
        "rgba(139, 244, 151,",
        "rgba(116, 242, 130,"
      ],
      e = !1,
      i = !1,
      o = Date.now(),
      a = [],
      r = 0,
      l = null;
  
    function d(t, e, i) {
      return (
        (t.color = n[(Math.random() * n.length) | 0] + (confetti.alpha + ")")),
        (t.color2 = n[(Math.random() * n.length) | 0] + (confetti.alpha + ")")),
        (t.x = Math.random() * e),
        (t.y = Math.random() * i - i),
        (t.diameter = 10 * Math.random() + 5),
        (t.tilt = 10 * Math.random() - 10),
        (t.tiltAngleIncrement = 0.07 * Math.random() + 0.05),
        (t.tiltAngle = 0),
        t
      );
    }
  
    function u() {
      i = !0;
    }
  
    function m() {
      (i = !1), s();
    }
  
    function s() {
      if (!i)
        if (0 === a.length)
          l.clearRect(0, 0, window.innerWidth, window.innerHeight), null;
        else {
          var n = Date.now(),
            u = n - o;
          (!t || u > confetti.frameInterval) &&
            (l.clearRect(0, 0, window.innerWidth, window.innerHeight),
            (function () {
              var t,
                n = window.innerWidth,
                i = window.innerHeight;
              r += 0.01;
              for (var o = 0; o < a.length; o++)
                (t = a[o]),
                  !e && t.y < -15
                    ? (t.y = i + 100)
                    : ((t.tiltAngle += t.tiltAngleIncrement),
                      (t.x += Math.sin(r)),
                      (t.y += 0.5 * (Math.cos(r) + t.diameter + confetti.speed)),
                      (t.tilt = 15 * Math.sin(t.tiltAngle))),
                  (t.x > n + 20 || t.x < -20 || t.y > i) &&
                    (e && a.length <= confetti.maxCount
                      ? d(t, n, i)
                      : (a.splice(o, 1), o--));
            })(),
            (function (t) {
              for (var n, e, i, o, r = 0; r < a.length; r++) {
                if (
                  ((n = a[r]),
                  t.beginPath(),
                  (t.lineWidth = n.diameter),
                  (i = n.x + n.tilt),
                  (e = i + n.diameter / 2),
                  (o = n.y + n.tilt + n.diameter / 2),
                  confetti.gradient)
                ) {
                  var l = t.createLinearGradient(e, n.y, i, o);
                  l.addColorStop("0", n.color),
                    l.addColorStop("1.0", n.color2),
                    (t.strokeStyle = l);
                } else t.strokeStyle = n.color;
                t.moveTo(e, n.y), t.lineTo(i, o), t.stroke();
              }
            })(l),
            (o = n - (u % confetti.frameInterval))),
            requestAnimationFrame(s);
        }
    }
  
    function c(t, n, o) {
      var r = window.innerWidth,
        u = window.innerHeight;
      window.requestAnimationFrame =
        window.requestAnimationFrame ||
        window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        window.oRequestAnimationFrame ||
        window.msRequestAnimationFrame ||
        function (t) {
          return window.setTimeout(t, confetti.frameInterval);
        };
      var m = document.getElementById("confetti-canvas");
      null === m &&
        ((m = document.createElement("canvas")).setAttribute(
          "id",
          "confetti-canvas"
        ),
        m.setAttribute(
          "style",
          "display:block;z-index:999999;pointer-events:none;position:fixed;top:0"
        ),
        document.body.appendChild(m),
        (m.width = r),
        (m.height = u),
        window.addEventListener(
          "resize",
          function () {
            (m.width = window.innerWidth), (m.height = window.innerHeight);
          },
          !0
        ),
        (l = m.getContext("2d")));
      var c = confetti.maxCount;
      if (n)
        if (o)
          if (n == o) c = a.length + o;
          else {
            if (n > o) {
              var f = n;
              (n = o), (o = f);
            }
            c = a.length + ((Math.random() * (o - n) + n) | 0);
          }
        else c = a.length + n;
      else o && (c = a.length + o);
      for (; a.length < c; ) a.push(d({}, r, u));
      (e = !0), (i = !1), s(), t && window.setTimeout(w, t);
    }
  
    function w() {
      e = !1;
    }
  })();


  $.fn.boom = function(e) {
	var colors = [
		'#ee6352',
		'#46ee58',
		'#fff',
		// '#FFD100',
		// '#FF9300',
		// '#FF7FA4'
	];
	var shapes = [
		'<polygon class="star" points="21,0,28.053423027509677,11.29179606750063,40.97218684219823,14.510643118126104,32.412678195541844,24.70820393249937,33.34349029814194,37.989356881873896,21,33,8.656509701858067,37.989356881873896,9.587321804458158,24.70820393249937,1.0278131578017735,14.510643118126108,13.94657697249032,11.291796067500632"></polygon>', 
		// '<path class="circle" d="m 20 1 a 1 1 0 0 0 0 25 a 1 1 0 0 0 0 -25"></path>',
		'<polygon class="other-star" points="18,0,22.242640687119284,13.757359312880714,36,18,22.242640687119284,22.242640687119284,18.000000000000004,36,13.757359312880716,22.242640687119284,0,18.000000000000004,13.757359312880714,13.757359312880716"></polygon>',
		'<polygon class="diamond" points="18,0,27.192388155425117,8.80761184457488,36,18,27.19238815542512,27.192388155425117,18.000000000000004,36,8.807611844574883,27.19238815542512,0,18.000000000000004,8.80761184457488,8.807611844574884"></polygon>'
	];

	var btn = $(this);
	var group = [];
	var num = Math.floor(Math.random() * 50) + 30;

	for(i = 0; i < num; i++) {
		var randBG = Math.floor(Math.random() * colors.length);
		var getShape = Math.floor(Math.random() * shapes.length);
		var c = Math.floor(Math.random() * 10) + 5;
		var scale = Math.floor(Math.random() * (8 - 4 + 1)) + 4;
		var x = Math.floor(Math.random() * (150 + 100)) - 100;
		var y = Math.floor(Math.random() * (150 + 100)) - 100;
		var sec = Math.floor(Math.random() * 1700) + 1000;
		var cir = $('<div class="cir"></div>');
		var shape = $('<svg class="shape">'+shapes[getShape]+'</svg>');
		
		shape.css({
			top: e.pageY - btn.offset().top + 100,
			left: e.pageX - btn.offset().left + 100 ,
			'transform': 'scale(0.'+scale+')',
			'transition': sec + 'ms',
			'fill': colors[randBG]
		});

		btn.siblings('.btn-particles').append(shape);

		group.push({shape: shape, x: x, y: y});
	}
	
	for (var a = 0; a < group.length; a++) {
		var shape = group[a].shape;
		var x = group[a].x, y = group[a].y;
		shape.css({
			left: x ,
			top: y ,
			'transform': 'scale(0)'
		});
	}
	
	setTimeout(function() {
		for (var b = 0; b < group.length; b++) {
			var shape = group[b].shape;
			shape.remove();
		}
		group = [];
	}, 2000);

}	

$(function() {
	$(document).on('click', '.btn', function(e) {
		$(this).boom(e);
	});

});


  var titleText = document.title;

function titleMarquee() {

 titleText = titleText.substring(1, titleText.length) + titleText.substring(0, 1);
 document.title = titleText;
 setTimeout("titleMarquee()", 300);
 }


titleMarquee();
  confetti.start();
  

