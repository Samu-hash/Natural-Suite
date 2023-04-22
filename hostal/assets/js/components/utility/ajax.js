// <![CDATA[
const ajax = {};

ajax.ajaxHandle_ = (data) => {
    let URL = $('body').attr('data-baseurl') + "index.php" + data.url;
      let request = $.post(
        URL,
        data.data,
        (response, status, xhr) => {
          data.function(response, status, xhr);
        },
        data.dataType
      );
    
      request.fail((jqXHR, textStatus) => {
        data.function(
          {
            message: jqXHR.status + " - " + jqXHR.statusText,
            response: 0,
          },
          textStatus
        );
    });
}
    
    
ajax.postJSON = (data) => {
    data.dataType = "json";
    ajax.ajaxHandle_(data);
};
    
export default ajax;
// ]]>