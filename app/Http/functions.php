<?php
/*::::::::::::::::::::::::::::::::::::::::::::::::::
                Admin  function
::::::::::::::::::::::::::::::::::::::::::::::::::*/
//telegram functions
function SendPhotoWithHtmlMessage($client,$bot_token,$chat_id,$photo,$caption)
{
  $html_text=urlencode($caption);
  $crawler = $client->request('POST','https://api.telegram.org/bot'.$bot_token.'/sendPhoto?chat_id='.$chat_id.'&photo='.$photo.'&caption='.$html_text.'&parse_mode=html');
  //dd($client->getResponse());
}
// site functions
function get_site_name_from_id($id)
{
  $site=App\SitesName::findOrFail($id);
  return  $site->name;
}
//category functions
function get_category_name_from_id($id)
{
  $category=App\Categorys::findOrFail($id);
  return  $category->name;
}
//bot function
function get_bot_statu($id)
{
    return '<span class="label label-success">مفعل</span>';
}

/*::::::::::::::::::::::::::::::::::::::::::::::::::
                Site function
::::::::::::::::::::::::::::::::::::::::::::::::::*/