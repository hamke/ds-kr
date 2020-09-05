var IMP = window.IMP; // 생략가능
// IMP.init('imp21028697'); // hello@wp-talk.com (카카오페이)
// IMP.init('imp21028697'); // hello@ttmkt.com (카카오페이)
IMP.init('imp14840138'); // leden_online@naver.com ( 카카오페이 / 테스트 )
// IMP.init('imp90524050'); // the235style@yahoo.com ( 나이스페이 / 테스트 )

function pay(message, qrcode_link, bitly_shortlink, data_result) {

  var product_name = '카카오페이 모바일 링크 생성 서비스';
  var product_price = document.getElementById('price');
  var product_option = document.getElementById('selectBox');

  if ( product_price !== null ) {
    var product_amount = product_price.innerHTML;
  } else if ( product_price == null && product_option !== null ) {
    var product_amount = product_option.options[selectBox.selectedIndex].value;
  } else {
    var product_amount = 100;
  }

  var message = message;
  var qrcode_link = qrcode_link;
  var bitly_shortlink = bitly_shortlink;
  var data_result = data_result;
  // console.log(data_result);

  IMP.request_pay({
    // amount : 10000,
    amount : product_amount,
  	buyer_name : '게스트(비회원)',
  	name : product_name
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

      var data = {
        message: message,
        qrcode_link: qrcode_link,
        bitly_shortlink: bitly_shortlink,
        product_name: product_name,
        product_amount: product_amount,
        data_result: data_result,
        imp_uid: rsp.imp_uid
      };
      // console.log(data_result);

      jQuery.ajax({
        url: "./process-after-payment-success.php",
        type: 'POST',
        data: data
      });

      jQuery("#inputForm").trigger("reset");

      jQuery(".file-upload-text").html('1. 이미지 파일을 선택해 주세요');

      jQuery(".loader").hide();

      jQuery(".ajax-return").html(data_result);

    } else { // if ( !rsp.success )

      var data = { qrcode_link:qrcode_link, bitly_shortlink:bitly_shortlink };
      // console.log(data_result);

      jQuery.ajax({
        url: "./process-after-payment-failure.php",
        type: 'POST',
        data: data
      });

      var msg = '결제가 중단/취소되었습니다.';
      alert( msg );
      // console.log( msg );
    }
  });

};
