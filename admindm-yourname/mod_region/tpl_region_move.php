<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}

 

  if($act=='update')
 {
  if($abc1==''){
     alert('请选择区域');
     jump($jumpvpf.'&act=edit&tid='.$tid); 
     exit;

  }


$sql = "SELECT * from ".TABLE_REGION."  where id='$tid' $andlangbh order by id limit 1";
$row222 = getrow($sql);
//$desp=zbdesp_imgpath($row['desp']);
$name= $row222['name']; 
$namebz= $row222['namebz']; $pos= $row222['pos']; 
$despjj= $row222['despjj']; 
$blockid= $row222['blockid']; 
$desp= $row222['desp']; 
$desptext= $row222['desptext']; 
$arr_cfg= $row222['arr_cfg']; 

//pre($_POST);
       
 $pidnamesub='block'.$bshou;
 $ss = "insert into ".TABLE_REGION." (pid,pidname,pbh,name,namebz,pos,despjj,blockid,desp,desptext,arr_cfg,lang,dateedit) values ('$abc1','$pidnamesub','$user2510','$name','$namebz','$pos','$despjj','$blockid','$desp','$desptext','$arr_cfg','".LANG."','$dateall')";
   //  echo $ss;exit;
      iquery($ss);  
alert('复制成功！');

 jump($jumpvreg.'&pid='.$pidname.'&file=sub'); 

 }
 


 

 
 
 if($act=='edit')
 {
	$jumpv_insert = $jumpvpf.'&act=update&tid='.$tid;
	$titleh2='复制区块';
	$sql = "SELECT * from ".TABLE_REGION."  where id='$tid' $andlangbh order by id limit 1";
$row = getrow($sql);

$pidnamesub=$row['pidname'];
$name=$row['name'];




?>


<h2 class="h2tit_biao"> <?php echo $titleh2?> </h2>

<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jumpv_insert;?>" method="post">
  <table class="formtab">
    <tr>
      <td width="20%" class="tr">要复制的区块：</td>
      <td width="78%"><?php echo $name?>
        </td>
    </tr>

	

    
 
<tr>
      <td class="tr">复制到：</td>
      <td>
     <?php 
        $sql = "SELECT id,name,pidname,pidstyle,pos from ".TABLE_REGION." where pid='0' and type='index' and pidname<>'$pidname'  $andlangbh  order by  pos desc,id desc";
          $rowlist = getall($sql);
                if($rowlist<>'no'){   
               // pre($rowlist); 

        ?>
          <select name="movepid">
              <option value="">请选择</option>
              <?php 
              
                  
                    foreach($rowlist as $vcat){
                       $tidmain=$vcat['id']; //tidmain ,not use tid,for conflict in subedit.php
                       $name=$vcat['name']; 
                     
                       $pidnamecur=$vcat['pidname'];
                       $pidstyle=$vcat['pidstyle'];  

                       $pidstylev = substr($pidstyle,0,5);
 
//if($pidstylev=='style') $name = '<span class="cyel">'.get_field(TABLE_STYLE,'title',$pidstyle,'pidname').'</span>';
                       //when edit mb, also edit region name.so not use above code

 
                       if($curstyle == $pidstyle) $selectV = ' selected ';
                       else $selectV = '  ';
                     echo '<option '.$selectV.'  value="'.$pidnamecur.'">'.$name.'</option>';
                    }

           
              
              ?>
              </select>
      
      <?php 
    }
        else {echo '暂无region';}
        ?>
      </td>
    </tr>
    
    <tr>
      <td></td>
      <td>
      <input  class="mysubmit" type="submit" name="Submit" value="<?php echo $titleh2;?>"></td>
    </tr>
    
  </table>
</form>
 
 <?php  }
 ?>

 
<script>
function checkhere(thisForm) {
 
 if (thisForm.movepid.value==""){
    alert("请选择区域。");
    thisForm.movepid.focus();
    return (false);
  }


     
  

 
   // return;

}
 

</script>

