<table align="center">
    
<tr><td align="center"><img width="100%" src = "<?php echo $image;?>"></td></tr>
<tr>
    <td align="center">Plot 686,Cadastral zone C 00,Jabi Airport Road bypass, Abuja.<p style="color:#0066FF; font-size:20px; font-weight:normal;">Office Of the Registrar</p><br /></td>
</tr>

<tr>
<td>
<?php

echo '<p>Academic Record Of : '. ucfirst($surname).' '.$firstname.' '.$othername.'</p>';
//echo '<p>OtherNames :'. $othername.'</p>';

echo '<p>Admission Number :'.$ad_number.'</p>';
echo '<p>Year Of Admission :'.$year_admission.'</p>';
echo '<p>Faculty :'.$faculty.'</p>';
echo '<p>Program :'.$program.'</p>';

echo 'Year: '.'1'.'<br/>'.'Academic Session :'.$year1.'<br/><br/>';
echo 'Year: '.'2'.'<br/>'.'Academic Session :'.$year2.'<br/><br/>';
echo 'Year: '.'3'.'<br/>'.'Academic Session :'.$year3.'<br/><br/>';
echo 'Year: '.'4'.'<br/>'.'Academic Session :'.$year4.'<br/><br/>'; 
echo 'Year: '.'5'.'<br/>'.'Academic Session :'.$year5.'<br/><br/>'; 

?>
<table border = "1">
    <tr>
            <th>MARKS RANGE</th>
            <th>LETTER</th>
            
    </tr>
    <tr>
        <td>70 and Above</td>
                <td>A</td>
        </tr>
        <tr>
                <td>60-69</td>
                <td>B</td>
        </tr>
        <tr>
                <td>50-59</td>
                <td>C</td>
        </tr>
        <tr>
                <td>45-49</td>
                <td>D</td>
        </tr>
        <tr>
                <td>40-44</td>
                <td>E</td>
        </tr>
        <tr>
                <td>Below 40</td>
                <td>F</td>
    </tr>
</table>
</td>
</tr>
</table>

<input type="submit" name = "submit" onclick="window.print()" value="Print Transcript"/>
<?php echo "<a href = ".site_url('moderator/pdf_export').">Export To PDF</a>";?>
