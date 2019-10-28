jQuery(document).ready(function(){
  jQuery("#existingcust").click(function(){
    if (jQuery(this).hasClass('active')!=true) {
      jQuery(".signuptype").removeClass('active');
      jQuery(this).addClass('active');
      jQuery("#signupfrm").fadeToggle('fast',function(){
        jQuery("#securityQuestion").fadeToggle('fast');
        jQuery("#loginfrm").hide().removeClass('hidden').fadeToggle('fast');
        jQuery("#btnCompleteOrder").attr('formnovalidate', true);
        jQuery("#btnUpdateOnly").attr('formnovalidate', true);
      });
      jQuery("#custtype").val("existing");
    }
  });
  jQuery("#newcust").click(function(){
    if (jQuery(this).hasClass('active')!=true) {
      jQuery(".signuptype").removeClass('active');
      jQuery(this).addClass('active');
      jQuery("#loginfrm").fadeToggle('fast',function(){
        jQuery("#securityQuestion").fadeToggle('fast');
        jQuery("#signupfrm").hide().removeClass('hidden').fadeToggle('fast');
        jQuery("#btnCompleteOrder").removeAttr('formnovalidate');
        jQuery("#btnUpdateOnly").removeAttr('formnovalidate');
      });
      jQuery("#custtype").val("new");
    }
  });
  jQuery("#inputDomainContact").on('change', function() {
    if (this.value == "addingnew") {
      jQuery("#domaincontactfields :input")
        .not("#domaincontactaddress2, #domaincontactcompanyname")
        .attr('required', true);
      jQuery("#domaincontactfields").hide().removeClass('hidden').slideDown();
    } else {
      jQuery("#domaincontactfields").slideUp();
      jQuery("#domaincontactfields :input").attr('required', false);
    }
  });
});

function showcats() {
  jQuery("#categories").slideToggle();
}

function selproduct(num) {
  jQuery('#productslider').slider("value", num);
  jQuery(".product").hide();
  jQuery("#product"+num).show();
  jQuery(".sliderlabel").removeClass("selected");
  jQuery("#prodlabel"+num).addClass("selected");
}

function recalctotals(hideLoading) {
  if (typeof hideLoading === 'undefined') {
    hideLoading = true;
  }
  if (!jQuery("#cartLoader").is(":visible")) {
    jQuery("#cartLoader").fadeIn('fast');
  }
  var post = jQuery.post("cart", 'ajax=1&a=confproduct&calctotal=true&'+jQuery("#orderfrm").serialize());
  post.done(
    function(data) {
      jQuery("#producttotal").html(data);
    }
  );
  if (hideLoading) {
    post.always(
      function() {
        jQuery("#cartLoader").delay(500).fadeOut('slow');
        reheight();
      }
    );
  }
}

function addtocart(gid) {
  var $newPassword1 = jQuery("#newPassword1").length;
  
  if ($newPassword1) {
     var pw = jQuery("#inputNewPassword1").val();
     var pwlength=(pw.length);
     if(pwlength>5)pwlength=5;
     else if(pwlength>4)pwlength=4.5;
     else if(pwlength>2)pwlength=3.5;
     else if(pwlength>0)pwlength=2.5;
     var numnumeric=pw.replace(/[0-9]/g,"");
     var numeric=(pw.length-numnumeric.length);
     if(numeric>3)numeric=3;
     var symbols=pw.replace(/\W/g,"");
     var numsymbols=(pw.length-symbols.length);
     if(numsymbols>3)numsymbols=3;
     var numupper=pw.replace(/[A-Z]/g,"");
     var upper=(pw.length-numupper.length);
     if(upper>3)upper=3;
     var pwstrength=((pwlength*10)-20)+(numeric*10)+(numsymbols*15)+(upper*10);
     if (pwstrength < 0) pwstrength = 0;
     if (pwstrength > 100) pwstrength = 100;

     errormsg = '';
     
     if (pwstrength < 50) {
       errormsg = '<li>Weak root password, please use a stronger password.</li>';
       jQuery("#password").val('');
     }
     var patt = /^[\w\d\-\.]+$/;
     var hostname = jQuery("#hostname").val();
     var res = patt.test(hostname);
     if (!res) {
       errormsg += '<li>Invalid hostname.</li>';
       jQuery("#hostname").val('');
     }
     if (errormsg) {
      errormsg = '<div class="alert alert-danger">'+errormsg+'</div>';
      jQuery("#configproducterror").html(errormsg);
      jQuery("#configproducterror").slideDown();
      jQuery("#loading1").slideUp();
      $(window).scrollTop(0);
      reheight();
      return false;
     }
  }

  jQuery("#loading1").slideDown();
  jQuery.post("cart", 'ajax=1&a=confproduct&'+jQuery("#orderfrm").serialize(),
  function(data){
    if (data) {
      data = '<div class="alert alert-danger">'+data+'</div>';
      jQuery("#configproducterror").html(data);
      jQuery("#configproducterror").slideDown();
      jQuery("#loading1").slideUp();
    } else {
      if (gid) window.location='cart?gid='+gid;
      else window.location='cart?a=confdomains';
    }
  });
}

function showCCForm() {
  if (!jQuery("#ccinputform").is(":visible")) {
    jQuery("#ccinputform").hide().removeClass('hidden').slideDown();
  }
}
function hideCCForm() {
  jQuery("#ccinputform").slideUp();
}
function useExistingCC() {
  jQuery(".newccinfo").hide();
}
function enterNewCC() {
  jQuery(".newccinfo").removeClass('hidden').show();
}

function updateConfigurableOptions(i, billingCycle) {
  jQuery("#cartLoader").fadeIn('fast');
  var post = jQuery.post(
    "cart",
    'a=cyclechange&ajax=1&i='+i+'&billingcycle='+billingCycle
  );

  post.done(
    function(data){
      if (data=='') {
        window.location='cart?a=view';
      } else {
        jQuery("#prodconfigcontainer").replaceWith(data);
        jQuery("#prodconfigcontainer").slideDown();
        recalctotals(false);
      }
    }
  );

  post.always(
    function() {
      jQuery("#cartLoader").delay(500).fadeOut('slow');
    }

  );
}

function catchEnter(e) {
  if (e) {
    addtocart();
    e.returnValue=false;
  }
}
