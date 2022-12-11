<?php
/*::::::::::::::::::::::::::::::::::::::::::::::::::
                Admin  function
::::::::::::::::::::::::::::::::::::::::::::::::::*/
//telegram functions
//send photo
function SendPhotoWithHtmlMessage($client,$bot_token,$chat_id,$photo,$caption)
{
  $html_text=urlencode($caption);
  $crawler = $client->request('POST','https://api.telegram.org/bot'.$bot_token.'/sendPhoto?chat_id='.$chat_id.'&photo='.$photo.'&caption='.$html_text.'&parse_mode=html');
  //dd($client->getResponse());
}
//get  updates
function get_updates($client,$bot_token)
{
  $crawler = $client->request('GET','https://api.telegram.org/bot'.$bot_token.'/getUpdates');
  dd($client->getResponse());
}
//send message
function send_message($client,$bot_token,$chat_id,$message)
{
  $text=urlencode($message);
  $crawler = $client->request('POST','https://api.telegram.org/bot'.$bot_token.'/sendMessage?chat_id='.$chat_id.'&text='.$text.'&parse_mode=html');
  dd($client->getResponse());
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
//scraper_is_active()
function scraper_is_active()
{
  $setting=App\Settings::findOrFail(1);
  if($setting->value=='on')
  {
    return true;
  }else
  {
    return false;
  }
}
//scraper_is_active()
function auto_markter_is_active()
{
  $setting=App\Settings::findOrFail(2);
  if($setting->value=='on')
  {
    return true;
  }else
  {
    return false;
  }
}

/*::::::::::::::::::::::::::::::::::::::::::::::::::
                Site function
::::::::::::::::::::::::::::::::::::::::::::::::::*/