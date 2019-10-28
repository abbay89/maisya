jQuery(function() {
    $('#orderfrm').submit(function(e) {
        console.log('submit');
        e.preventDefault();
        
        var $newPassword1 = jQuery("#newPassword1");
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
            e.preventDefault();
            jQuery("#valerrorwrapper").attr("hidden", false);
            jQuery("#valerror").html(errormsg);
            $(window).scrollTop(0);
        }
    });
});
