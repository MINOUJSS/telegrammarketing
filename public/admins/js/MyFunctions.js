//
function aproved(product_id)
{
    $.ajax({
        url:'product/aproved/'+product_id,
        Type:'GET',
        dataType:'json',
        success:function(data)
        {
                alert(data);                                        
        }
    });
}
//
function setting_scraper(setting_id)
{
    $.ajax({
        url:'setting/scraper/statu/'+setting_id,
        Type:'GET',
        dataType:'json',
        success:function(data)
        {
                console.log(data);                                        
        }
    });
}
//
function setting_marketing(setting_id)
{
    $.ajax({
        url:'setting/auto_marketing/statu/'+setting_id,
        Type:'GET',
        dataType:'json',
        success:function(data)
        {
                alert(data);                                        
        }
    });
}