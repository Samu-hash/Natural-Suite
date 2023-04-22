//<![CDATA[
const loading = {}

loading._creteLoading = (txt, body) => {
    
    if (txt === null || txt === "") {
        txt = 'Cargando, espere un momento...'
    }
    const html = `<div id="loading" class="preloader"></div>`;
    body.append(html);

    $('.preloader').css({ 'zIndex': '0', 'position': 'absolute' })
}
    
loading._deleteLoading = () => {
    $('#loading').remove();
}
    
loading.showLoading = (funcOK, txt = null, flag = null) => {
    loading._creteLoading(txt, flag);
    $('#loading').animate({ 'opacity': '1' }, 500, () => {
        if (funcOK != null) {
            funcOK();
        }
    });
}
    
loading.hideLoading = () => {
    $('#loading').animate({
        opacity: 0
    }, 500, () => {
        loading._deleteLoading();
    });
}
    
export default loading;
//>]]