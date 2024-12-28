<?php
require "connection.php";
$dcme = 0;
$dece = 0;
$deee= 0;
$dce =0;
$dme = 0;
$dmng = 0;
$cme = 30;
$ece=30;
$ce =30;
$mng=30;
$me =30;
$eee=30;
function dis($ht,$ch)
{

  global $dcme;
  global $con;
global $dece;
global $deee;
global $dce;
global $dme;
global $dmng;
global $cme;
global $ece;
global $eee;
global $ce;
global $me;
global $mng;
switch($ch)
{
  case "dcme":
            
              if($dcme<$cme)
              {
                mysqli_query($con,"insert into results(HTNO,BRANCH) values($ht,'dcme')");
                $dcme++;
                return 1;
              }
                else{
                return 0;
             }
            
  case "dece":
              if($dece<$ece)
              {
                mysqli_query($con,"insert into results(HTNO,BRANCH) values($ht,'dece')");
                $dece++;
                return 1;
              }
              else
              {
                return 0;
              }
               
  case "deye":
             if($deee<$eee)
              {
                mysqli_query($con,"insert into results(HTNO,BRANCH) values($ht,'deee')");
                $deee++;
                return 1;
              }
                else{
                return 0;
               }
                
  case "dce":
            if($dce<$ce)
              {
                mysqli_query($con,"insert into results(HTNO,BRANCH) values($ht,'dce')");
                $dce++;
                return 1;
              }
                else{
                return 0;
               }
                
  case "dme":
             if($dme<$me)
              {
                mysqli_query($con,"insert into results(HTNO,BRANCH) values($ht,'dme')");
                $dme++;
                return 1;
              }
                else{
                return 0;
              }
                
  case "dmng":
             if($dmng<$mng)
              {
                mysqli_query($con,"insert into results(HTNO,BRANCH) values($ht,'dmng')");
                $dmng++;
                return 1;
              }
                else{
                return 0;
              }
                
  default:break; 
  }
}
$res=mysqli_query($con,"select * from ad1 order by MARKS DESC");
while($row=mysqli_fetch_array($res))
{ 
  $check=dis($row["HTNO"],$row["FIRST"]);
  
  if($check==0 and $row["SECOND"]!='none')
   {
     $check=dis($row["HTNO"],$row["SECOND"]);
      if($check==0 and $row["THIRD"]!='none')
      {
        $check=dis($row["HTNO"],$row["THIRD"]);
         if($check==0 and $row["FOURTH"]!='none')
          {
           $check=dis($row["HTNO"],$row["FOURTH"]);
             if($check==0 and $row["FIFTH"]!='none')
              {
               $check=dis($row["HTNO"],$row["FIFTH"]);
               if($check==0 and $row["SIXTH"]!='none')
                 {
                   $check=dis($row["HTNO"],$row["SIXTH"]);
                  }
              }
          }
      }
   }
}
echo "Alloted successfully";