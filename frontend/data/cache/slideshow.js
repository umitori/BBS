function SlideShow(c,wrapObj,imgObj,barObj) {
    var a = $(wrapObj), f = $(imgObj).children("div.slide-div"), h = $(barObj), n = h.find("li"), d = f.length, c = c || 3000, e = lastI = 0, j = 0, m = 0;
    function b() {
        m = setInterval(function () {
            e = e + 1 >= d ? e + 1 - d : e + 1;
            g()
        }, c)
    }
    function k() {
        clearInterval(m);
    }
    function g() {
		f.eq(e).show();
		f.eq(e).siblings().hide();
		n.eq(e).addClass("on");
		n.eq(e).siblings().removeClass("on");
		lastI = e;
    }
    b();
	f.eq(e).show();
	a.hover(
		function(){
			k();
		},function(){
			b();
	})
	n.hover(
		function(){
			var $this = $(this);			
			e = parseInt($this.html(), 10) - 1;
			g();
		},function(){
	})
}