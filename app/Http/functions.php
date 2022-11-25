<?php
/*::::::::::::::::::::::::::::::::::::::::::::::::::
                Admin  function
::::::::::::::::::::::::::::::::::::::::::::::::::*/
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