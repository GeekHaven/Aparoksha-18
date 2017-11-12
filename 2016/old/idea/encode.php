<?php

class Posts
{


	private $data = array();
	
	public function __construct($row)
	{
		/*
		/	The constructor
		*/
		
		$this->data = $row;
	}
	
	public function markup()
	{
		/*
		/	This method outputs the XHTML markup of the Posts
		*/
		
		$p = &$this->data;
		
	
		return '
				';
		
	}
	
	}
	
?>
	
	
	
	











<div class="row">
      <div class="ten wide column">
      <div class="ui segment">
      <div class="circular huge ui icon button">
		<i class="large user icon"></i>
	  </div><font size="6">     <?php echo $fname; ?></font>


<?php
echo '	 <h2>'.$title.'</h2>';?>
	  
	  
	   
	  <div class="ui segment"><div class="ui corner label">
        <i class="icon asterisk"></i>
      </div>
	   <?php echo $idea; ?>
	   </div>
	   
	   
    <div class="tab-cnt">
        
       
        <div class="like-btn <?php if($like_count == 1){ echo 'like-h';} ?>"><?php if($like_count == 1){ echo 'Unlike';}else{echo'Like';} ?></div>
       
       
        <div class="tab-tr" id="t1">
           

            <div class="stat-cnt">
                <div class="like-count" style="margin-top: 22px;"><?php echo $rate_like_count; ?> <?php if($rate_like_count>1){echo "Likes";}else{echo "Like";}?></div>
            </div><!-- /stat-cnt -->
        </div><!-- /tab-tr -->
    
    
<!-- Comment Box -->
     <div class="ui one column grid">
  <div class="column">
    <div class="ui piled blue segment">
      <h2 class="ui header">
        <i class="icon inverted circular blue comment"></i> Comments
      </h2>
	  <div class="ui comments">
	  
	  
	
<div class="cmt-container" >
    
    <div class="comment">
          <a class="avatar">
            <i class="large user icon"></i>
          </a>
          <div class="content">
              <?php echo $fname; ?>
            
           <div class="text"><?php echo $comment; ?></div> 
              
            <?php //echo '<div class="date" title="Added at '.date('H:i \o\n d M Y',$date).'">'.date('d M Y',$date).'</div>' ?>
            
          </div>
        </div>
    
   
<div class="com-box" style="padding-top: 20px;">
    <div class="new-com-bt">
        <span>Write a comment ...</span>
    </div>
    <div class="new-com-cnt">
    	<input id="cmnt-user" type="hidden" value="<?php echo $_SESSION['name']; ?>" />
        <textarea id="cmnt-com" class="the-new-com"></textarea>
        <div class="bt-add-com">Post comment</div>
        <div class="bt-cancel-com">Cancel</div>
    </div>
    <div class="clear"></div>
</div>

</div>

</div>
    </div>
  </div>
</div>

    </div>
	
		

      </div></div></div>