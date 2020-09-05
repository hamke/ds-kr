jQuery(document).ready(function() {

  jQuery("#inputForm").submit(function(e) {
    e.preventDefault();

    jQuery(".ajax-return").html(
      "<div class=\"py-5 text-center\">" +
        "<div class=\"spinner-grow loader\" id=\"loader\" role=\"status\">" +
          "<span class=\"sr-only\">Please Wait ...</span>" +
        "</div>" +
        "<div class=\"loader\">잠시만 기다려 주세요 ...</div>" +
      "</div>"
    );

    var form_data = new FormData();
    var files = jQuery('#kakaopay_image')[0].files[0];
    form_data.append('kakaopay_image', files);

    jQuery.ajax({
      url: "./process.php",
      type: 'POST',
      data: form_data,
      contentType: false,
      processData: false,
      success: function(response) {

        jQuery("#inputForm").trigger("reset");

        jQuery(".file-upload-text").html('1. 이미지 파일을 선택해 주세요');

        jQuery(".loader").hide();

        jQuery(".ajax-return").html(response);

      }
    });
  });
});
