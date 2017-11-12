var particle = window.particle || {};
function stop () {
	cancelAnimationFrame(particle.dId);
}

(function($) {

	particle = {
		ctx: null,
		width: 0,
		height: 0,
		list: [],
		tlist: [],
		dId: 0,
		tnumber: 0,

		init: function() {
			//init click
			$('#Terminal').css({"display":"none"});
			$('.img').on('click', function() {
				$(this).addClass('active').siblings().removeClass('active');
				particle.reset();
				particle.reinit();
			});

			particle.reinit();
			
		},

		reset: function() {
			stop();
			particle.tlist = [];
			particle.tnumber = 0;
		},

		reinit: function() {
			//init animation
			var canvas = $('#context');
			particle.ctx = canvas[0].getContext('2d');
			particle.width = $(window).width();
			particle.height = $(window).height();
			canvas.attr('width', particle.width);
			canvas.attr('height', particle.height - 5);
			//get image data
			var obj = $('.img.active');
			console.log('w: ' + obj.width() + ', h: ' + obj.height());
			var temp = $('#buffer')[0];
			var imgData;
			$(temp).attr('width', obj.width());
			$(temp).attr('height', obj.height());
			temp.ctx = temp.getContext('2d');
			temp.ctx.drawImage(obj[0], 0, 0);
			imgData = temp.ctx.getImageData(0, 0, obj.width(), obj.height());
			console.log('w: ' + imgData.width + ', h: ' + imgData.height);

			//
			var loop = 0;
			var ins = Math.round(imgData.data.length / ((imgData.width + imgData.height) * 24));
			ins = Math.round(ins / 4) * 4;
			console.log(ins);
			for (var i = 0; i < imgData.data.length; i += ins) {
				var r = imgData.data[i];
				var g = imgData.data[i + 1];
				var b = imgData.data[i + 2];
				var a = imgData.data[i + 3];
				var index = Math.floor(i / 4);
				var x = Math.round(index % imgData.width) + particle.width / 2;
				var y = Math.floor(index / imgData.width) + particle.height / 10;
				if (a > 0) {
					var tg = { dx: x, dy: y, x: x, y: y, ready: false, a: a/255, fill: 'rgb(' + r + ',' + g + ', ' + b + ')' };	
					particle.tlist.push(tg);
					loop++;
				}
			}
			//
			var max = loop > particle.list.length ? loop : particle.list.length;
			particle.tnumber = loop;
			console.log(loop);
			for (i = 0; i < max; i++) {
				var x = Math.random() * particle.width;
				var y = -(Math.random() * particle.height);
				var r = Math.random() * 1.2 + 0.4;
				var vx = Math.random() * 2 - 0.5;
				var vy = Math.random() * (2 + r) + 4;
				var ay = Math.random() * (0.008 + r / 500) + 1.002;
				var t = particle.tlist[i] || null;
				var fill = t ? t.fill : 'rgb(255,255,255)';
				var a = t ? t.a : 1;
				if (particle.list[i]) {
					particle.list[i].target = t;
					particle.list[i].fill = fill;
					particle.list[i].a = a;
				} else {
					particle.list.push({x: x, y: y, vx: vx, vy: vy, bvy: vy, ay: ay, r: r, target: t, fill: fill, a: a});
				}
			}
			particle.dId = requestAnimationFrame(particle.draw);
		},

		draw: function () {
			//draw
			// - clear
			particle.ctx.save();
			particle.ctx.globalAlpha = 0.8;
			particle.ctx.fillStyle = '#000';
			particle.ctx.fillRect(0, 0, particle.width, particle.height);
			particle.ctx.restore();
			// - draw particle
			for (i = 0; i < particle.list.length; i++) {
				particle.ctx.save();
				particle.ctx.beginPath();
				var item = particle.list[i];
				particle.ctx.globalAlpha = item.a;
				particle.ctx.fillStyle = item.fill;
				particle.ctx.arc(item.x, item.y, item.r, 0, Math.PI*2);	
				particle.ctx.fill();
				particle.ctx.closePath();
				particle.ctx.restore();

				//move to target
				if (item.target) {
					if (!item.target.ready) {
						if (Math.round(Math.random()*150) > 1) {
							//normal move
							if (item.x < 0) {
								item.x = particle.width;
							} else if (item.x > particle.width) {
								item.x = 0;
							} else {
								item.x += item.vx;
							}
							if (item.y < particle.height) {
								item.y += item.vy;	
								item.vy *= item.ay;
							} else {
								item.y = -(Math.random() * 4 + 1);
								item.vy = item.bvy;
							}
							item.target.y += 0.2;
							particle.list[i] = item;
							continue;
						}
					}
					item.target.ready = true;
					var dx = item.target.x - item.x;
					var dy = item.target.y - item.y;
					var mx = dx / 50;
					mx = Math.abs(mx) > 0.4 ? mx : (((Math.random() * dx) / 10) + mx);
					var my = dy / 50;
					my = Math.abs(my) > 0.4 ? my : (((Math.random() * dy) / 10) + my);
					item.x += mx;
					item.y += my;
					item.target.y += 0.2;

					if (Math.abs(dx) < 10 && Math.abs(dy) < 10 && item.y > particle.height * 0.75) {
						item.target = null;
						particle.tnumber--;
					}

					//reinit
					if (particle.tnumber == 0) {
						for (i = 0; i < particle.tlist.length; i++) {
							particle.list[i].target = particle.tlist[i];
							particle.list[i].target.ready = false;
							particle.list[i].target.y = particle.list[i].target.dy;
							particle.tnumber = particle.tlist.length;
							particle.rand = 1;
						}
					}
				} 
				else {
					//normal move
					if (item.x < 0) {
						item.x = particle.width;
					} else if (item.x > particle.width) {
						item.x = 0;
					} else {
						item.x += item.vx;
					}
					if (item.y < particle.height) {
						item.y += item.vy;	
						item.vy *= item.ay;
					} else {
						item.y = -(Math.random() * 4 + 1);
						item.vy = item.bvy;
					}
					// console.log('normal move');
				}
				
				particle.list[i] = item;
			}
			
			//timeline
			particle.dId = requestAnimationFrame(particle.draw);
		}
	};
})(jQuery);

$(window).load(function($) {

	setTimeout(function(){particle.init();},16000);
});