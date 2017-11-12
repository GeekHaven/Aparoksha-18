<?php
class Link
{
	public static function Build($link, $type = 'http')
	{
		$base = ( ($type == 'http' || USE_SSL =='no')? 'http://' : 'https://') . getenv('SERVER_NAME');
		
		if(defined('HTTP_SERVER_PORT') && HTTP_SERVER_PORT != 80 && strpos($base, 'https') == false )
			$base = $base . ':' .HTTP_SERVER_PORT;
			
		$link = $base . VIRTUAL_LOCATION . $link;
		return $link;
	}
	
	
	
	public static function toLogin($x)
	{
		$link = $x;
		return self::Build($link);
	}
	
	public static function viewNav()
	{
		$link = '?type=nav&action=generate';
		return self::Build($link);
	}

	public static function addNav()
	{
		$link = '?type=nav&action=add';
		return self::Build($link);	
	}
	
	public static function editNav($value)
	{
		$link = '?type=nav&action=edit&value=' . $value;
		return self::Build($link);
	}
	
	public static function delNav($value)
	{
		$link = '?type=nav&action=del&value=' . $value;
		return self::Build($link);
	}
	
	public static function actNav($value)
	{
		$link = '?type=nav&action=activate&value=' . $value;
		return self::Build($link);	
	}
	
	public static function uploadNav($value)
	{
		$link = '?type=nav&action=upload&value=' . $value;
		return self::Build($link);	
	}
	
	public static function addSubnav($value)
	{
		$link = '?type=subnav&action=add&value=' . $value;
		return self::Build($link);
	}
	
	public static function uploadSubNav($value)
	{
		$link = '?type=subnav&action=upload&value=' . $value;
		return self::Build($link);	
	}
	
	public static function editsubNav($value)
	{
		$link = '?type=subnav&action=edit&value=' . $value;
		return self::Build($link);
	}
	
	public static function delSubnav($value)
	{
		$link = '?type=subnav&action=del&value=' . $value;
		return self::Build($link);
	}
	
	public static function actSubnav($value)
	{
		$link = '?type=subnav&action=activate&value=' . $value;
		return self::Build($link);
	}
	
	public static function addRpanelTopic()
	{
		$link = '?type=rpanel&action=add';
		return self::Build($link);
	}
	
	public static function editRpanelTopic($value)
	{
		$link = '?type=rpanel&action=edit&value=' . $value;
		return self::Build($link);
	}
	
	public static function delRpanelTopic($value)
	{
		$link = '?type=rpanel&action=del&value=' . $value;
		return self::Build($link);
	}

	public static function addRpanelContent($value)
	{
		$link = '?type=rpanelcontent&action=add&value=' . $value;
		return self::Build($link);
	}
	
	public static function editRpanelContent($value)
	{
		$link = '?type=rpanelcontent&action=edit&value=' . $value;
		return self::Build($link);
	}
	
	public static function delRpanelContent($value)
	{
		$link = '?type=rpanelcontent&action=del&value=' . $value;
		return self::Build($link);
	}
	
	public static function actRpanelTopic($value)
	{
		$link = '?type=rpanel&action=activate&value=' . $value;
		return self::Build($link);
	}
	
	public static function actRpanelContent($value)
	{
		$link = '?type=rpanelcontent&action=activate&value=' . $value;
		return self::Build($link);
	}
	
	public static function deactRpanelTopic($value)
	{
		$link = '?type=rpanel&action=deactivate&value=' . $value;
		return self::Build($link);
	}
	
	public static function deactRpanelContent($value)
	{
		$link = '?type=rpanelcontent&action=deactivate&value=' . $value;
		return self::Build($link);
	}
	
	public static function viewRpanelTopic()
	{
		$link = '?type=rpanel&action=generate';
		return self::Build($link);
	}
	
	public static function viewRpanelContent()
	{
		$link = '?type=rpanelcontent&action=generate';
		return self::Build($link);
	}
	
	public function uploadRpanel($value=0) {
		$link = '?type=rpanel&action=upload&value=' . $value;
		return self::Build($link);
	}
	
	public static function addEvent()
	{
		$link = '?type=events&action=add';
		return self::Build($link);
	}
	
	public static function viewEvent()
	{
		$link = '?type=events&action=generate';
		return self::Build($link);
	}
	
	public static function editEvent($value)
	{
		$link = '?type=events&action=edit&value=' . $value;
		return self::Build($link);
	}
	
	public static function delEvent($value)
	{
		$link = '?type=events&action=del&value=' . $value;
		return self::Build($link);
	}
	
	public static function actEvent($value)
	{
		$link = '?type=events&action=activate&value=' . $value;
		return self::Build($link);
	}
	
	public static function deactEvent($value)
	{
		$link = '?type=events&action=deactivate&value=' . $value;
		return self::Build($link);
	}
	
	public static function uploadEvent($value)
	{
		$link = '?type=events&action=upload&value=' . $value;
		return self::Build($link);
	}
	
	public static function addNews()
	{
		$link = '?type=news&action=add';
		return self::Build($link);
	}
	
	public static function viewNews()
	{
		$link = '?type=news&action=generate';
		return self::Build($link);
	}
	
	public static function actNews($value)
	{
		$link = '?type=news&action=activate&value=' . $value;
		return self::Build($link);
	}
	
	public static function deactNews($value)
	{
		$link = '?type=news&action=deactivate&value=' . $value;
		return self::Build($link);
	}
	
	public static function editNews($value)
	{
		$link = '?type=news&action=edit&value=' . $value;
		return self::Build($link);
	}
	
	public static function delNews($value)
	{
		$link = '?type=news&action=del&value=' . $value;
		return self::Build($link);
	}
	
	public static function addAnnouncement()
	{
		$link = '?type=announcements&action=add';
		return self::Build($link);
	}
	
	public static function editAnnouncement($value)
	{
		$link = '?type=announcements&action=edit&value=' . $value;
		return self::Build($link);
	}
	
	public static function viewAnnouncement()
	{
		$link = '?type=announcements&action=generate';
		return self::Build($link);
	}
	
	public static function delAnnouncement($value)
	{
		$link = '?type=announcements&action=del&value=' . $value;
		return self::Build($link);
	}
	
	public static function actAnnouncement($value)
	{
		$link = '?type=announcements&action=activate&value=' . $value;
		return self::Build($link);
	}
	
	public static function deactAnnouncement($value)
	{
		$link = '?type=announcements&action=deactivate&value=' . $value;
		return self::Build($link);
	}
	
	public static function uploadAnnouncement($value)
	{
		$link = '?type=announcements&action=upload&value='.$value ;
		return self::Build($link);
	}
	
	public static function addTender()
	{
		$link = '?type=tenders&action=add';
		return self::Build($link);
	}
	
	public static function editTender($value)
	{
		$link = '?type=tenders&action=edit&value=' . $value;
		return self::Build($link);
	}
	
	public static function viewTender()
	{
		$link = '?type=tenders&action=generate';
		return self::Build($link);
	}
	
	public static function delTender($value)
	{
		$link = '?type=tenders&action=del&value=' . $value;
		return self::Build($link);
	}
	
	public static function actTender($value)
	{
		$link = '?type=tenders&action=activate&value=' . $value;
		return self::Build($link);
	}
	
	public static function uploadTender($value)
	{
		$link = '?type=tenders&action=upload&value='.$value ;
		return self::Build($link);
	}
	
	public static function deactTender($value)
	{
		$link = '?type=tenders&action=deactivate&value=' . $value;
		return self::Build($link);
	}
	
	public static function addCarousel()
	{
		$link = '?type=carousel&action=add';
		return self::Build($link);
	}
	
	public static function editCarousel($value)
	{
		$link = '?type=carousel&action=edit&value=' . $value;
		return self::Build($link);
	}
	
	public static function delCarousel($value)
	{
		$link = '?type=carousel&action=del&value=' . $value;
		return self::Build($link);
	}
	
	public static function viewCarousel()
	{
		$link = '?type=carousel&action=generate';
		return self::Build($link);
	}
	
	public static function actCarousel($value)
	{
		$link = '?type=carousel&action=activate&value=' . $value;
		return self::Build($link);
	}
	
	public static function deactCarousel($value)
	{
		$link = '?type=carousel&action=deactivate&value=' . $value;
		return self::Build($link);
	}
	
	public static function uploadCarousel($value)
	{
		$link = '?type=carousel&action=upload&value=' . $value;
		return self::Build($link);
	}
	
	public static function addSubTopic()
	{
		$link = '?type=subscriptions&action=add';
		return self::Build($link);
	}
	
	public static function editSubTopic($value)
	{
		$link = '?type=subscriptions&action=edit&value=' . $value;
		return self::Build($link);
	}
	
	public static function delSubTopic($value)
	{
		$link = '?type=subscriptions&action=del&value=' . $value;
		return self::Build($link);
	}
	
	public static function viewSubTopic()
	{
		$link = '?type=subscriptions&action=generate';
		return self::Build($link);
	}
	
	public static function addSubContent($value)
	{
		$link = '?type=sub_content&action=add&value='.$value;
		return self::Build($link);
	}
	
	public static function delSubContent($value)
	{
		$link = '?type=sub_content&action=del&value=' . $value;
		return self::Build($link);
	}
	
	public static function viewSubContent($value)
	{
		$link = '?type=sub_content&action=edit&value=' . $value;
		return self::Build($link);
	}
	
	public static function showSubContent($value)
	{
		$link = '?type=sub_content&action=generate&value=' . $value;
		return self::Build($link);
	}
	
	public static function sendSubContent($value)
	{
		$link = '?type=sub_content&action=send&value='.$value;
		return self::Build($link);
	}
	
	public static function viewQuery()
	{
		$link = '?type=query&action=generate';
		return self::Build($link);
	}
	
	public static function delQuery($value)
	{
		$link = '?type=query&action=del&value='.$value;
		return self::Build($link);
	}
	
	
	public static function viewUsers()
	{
		$link = '?type=user_accounts&action=generate';
		return self::Build($link);
	}
	
	public static function addUser()
	{
		$link = '?type=user_accounts&action=add';
		return self::Build($link);
	}
	
	public static function editUser($value)
	{
		$link = '?type=user_accounts&action=edit&value=' . $value;
		return self::Build($link);
	}
	
	public static function delUser($value)
	{
		$link = '?type=user_accounts&action=del&value=' . $value;
		return self::Build($link);
	}
		public static function actUser($value)
	{
		$link = '?type=user_accounts&action=activate&value=' . $value;
		return self::Build($link);
	}
	
	public static function deactUser($value)
	{
		$link = '?type=user_accounts&action=deactivate&value=' . $value;
		return self::Build($link);
	}
	
	public static function viewGfiles()
	{
		$link = '?type=gfiles&action=generate';
		return self::Build($link);
	}
	
	public static function uploadGfiles()
	{
		$link = '?type=gfiles&action=upload&value=0';
		return self::Build($link);
	}
	
	public static function editSettings() {
		$link = '?type=settings&action=edit&value=1';
		return self::Build($link);
	}
	
}
?>