var IMP = window.IMP; // 생략가능
// IMP.init('imp21028697'); // hello@wp-talk.com (카카오페이)
// IMP.init('imp21028697'); // hello@ttmkt.com (카카오페이)
// IMP.init('imp14840138'); // leden_online@naver.com ( 카카오페이 / 테스트 )
IMP.init('imp90524050'); // the235style@yahoo.com ( 나이스페이 / 테스트 )

function pay() {

  var product_price = document.getElementById('price');
  var product_option = document.getElementById('selectBox');

  if ( product_price !== null ) {
    var product_amount = product_price.innerHTML;
  } else if ( product_price == null && product_option !== null ) {
    var product_amount = product_option.options[selectBox.selectedIndex].value;
  } else {
    var product_amount = 100;
  }

  IMP.request_pay({
    // amount : 10000,
    amount : product_amount,
  	buyer_name : '게스트(비회원)',
  	name : '디소스 #05'
    // pg: 'inicis', // version 1.1.0부터 지원.
    // pay_method: 'card',
    // merchant_uid: 'merchant_' + new Date().getTime(),
    // buyer_email: 'iamport@siot.do',
    // buyer_tel: '010-1234-5678',
    // buyer_addr: '서울특별시 강남구 삼성동',
    // buyer_postcode: '123-456',
    // m_redirect_url: 'https://www.yourdomain.com/payments/complete'
  }, function(rsp) {
    if ( rsp.success ) {

      jQuery(".ajax-return").html(
        "<div class=\"py-5 text-center\">" +
          "<div class=\"spinner-grow loader\" id=\"loader\" role=\"status\">" +
            "<span class=\"sr-only\">Please Wait ...</span>" +
          "</div>" +
          "<div class=\"loader\">잠시만 기다려 주세요 ...</div>" +
        "</div>"
      );

      var data = new FormData();
      var files = jQuery('#kakaopay_image')[0].files[0];
      data.append('kakaopay_image', files);

      jQuery.ajax({
        url: "./process.php",
        type: 'POST',
        data: data,
        contentType: false,
        processData: false,
        success: function(response) {

          jQuery("#inputForm").trigger("reset");

          jQuery(".file-upload-text").html('1. 이미지 파일을 선택해 주세요');

          jQuery(".loader").hide();

          jQuery(".ajax-return").html(response);

        }
      });
    } else { // if ( !rsp.success )

        var msg = '결제가 중단/취소되었습니다.';
        alert( msg );
        console.log( msg );
    }
  });

};
