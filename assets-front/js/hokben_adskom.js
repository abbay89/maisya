	(function(a,d,s,k,o,m,r){
	  a['__akObject'] = o;
	  a[o] = a[o] || {
		send: function(){
		  (a[o].q=a[o].q||[]).push(arguments);
		},
		mark: function(k){
		  a[o].i=a[o].i||k;
		}
	  };
	  r = d.createElement(s);
	  r.async=1;
	  r.src=k;
	  m = d.getElementsByTagName(s)[0];
	  m.parentNode.insertBefore(r,m);

	})(window,document,'script','//ssp.adskom.com/akp.js','ak');
	ak.mark('98fb5dfb-3363-4e7d-8ed0-454224b66014');
	
	//AddDetail
	function onProductClick(id) {
	  var i = {
		product: {
		  id: id
		},
		action: 'click' 
	  };

	  ak.send('ec', {item: i});
	}
	
	//addToCart
	function onProductAdd(id) {
		var i = {
		product: {
		  id: id
		},
		action: 'add'
	  };

	  ak.send('ec', {item: i});
	}
	
	//delete Cart
	function onProductRemove(id) {
	  var i = {
		product: {
		  id: id
		},
		action: 'remove'
	  };

	  ak.send('ec', {item: i});
	}
	