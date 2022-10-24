

var html = "<div class='rte editor button-group' id='fontFamilyGroup' style=''>";
    html += "<div class='rte editor dropdown-label' style='float:left;'><i class='fa fa-fw fa-font'></i></div>";
    html += "<select class='rte dropdown editor' id='fontFamily' title='Font Family'><i class='fa fa-fw fa-font'></i>"; 
    html += "<option value='Arial, Helvetica, sans-serif' style='font-family: Arial, Helvetica, sans-serif'>Arial</option>";
    html += "<option value=''Arial Black', Gadget, sans-serif' style='font-family: 'Arial Black', Gadget, sans-serif'>Arial Black</option>";
    html += "<option value=''Times New Roman', serif' style='font-family: 'Times New Roman'>Times New Roman</option>";
    html += "<option value=''Palatino Linotype', 'Book Antiqua', Palatino, serif' style='font-family: 'Palatino Linotype', 'Book Antiqua', Palatino, serif'>Book Antiqua</option>";
    html += "<option value='Impact, Charcoal, sans-serif', style='font-family: Impact, Charcoal, sans-serif'>Impact</option>";
    html+= "<option value=''Lucida Sans Unicode', 'Lucida Grande', sans-serif' style='font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif'>Lucida Console</option>";
    html+="<option value='Tahoma, Geneva, sans-serif' style='font-family: Tahoma, Geneva, sans-serif'>Tahoma</option>";
    html+="<option value=''Trebuchet MS', Helvetica, sans-serif' style='font-family: 'Trebuchet MS', Helvetica, sans-serif'>Trebuchet MS</option>";
    html+="<option value='Verdana, Geneva, sans-serif' style='font-family: Verdana, Geneva, sans-serif'>Verdana</option>";
    html+="<option value='Sarabun,sans-serif' style='font-family:Sarabun, sans-serif'>Sarabun TH</option>";
    html+="</select>";
    html+= "</div>";

//Header Style 
html += "<div class='rte editor button-group' id='parStyleGroup'>";
html += "<div class='rte editor dropdown-label' style='float:left;'><i class='fa fa-fw fa-header'></i></div>";
html += "<select class='rte dropdown editor' id='parStyle' title='Paragraph Style' style='float:left;width:110px;'><i class='fa fa-fw fa-font'></i>";
html += "<option value='h1' style='font-size: 2em; font-style: bold;' id='heading1'>Heading 1</option>";
html += "<option value='h2' style='font-size: 1.75em; font-style: bold;' id='heading2'>Heading 2</option>";
html += "<option value='h3' style='font-size: 1.5em; font-style: bold;'>Heading 3</option>";
html += "<option value='h4' style='font-size: 1.25em; font-weight: 900;'>Heading 4</option>";
html += "<option value='h5' style='font-size: 1.15em; font-weight: bold;'>Heading 5</option>";
html += "<option value='h5' style='font-size: 1.15em; font-weight: bold;'>Heading 6</option>";
html += "<option selected value='p' style='font-size: 1.0em; font-weight: bold;'>Paragraph</option>";
html += "</select>";
html += "</div>";

//Font Size

html += "<div class='rte editor button-group' id='textSizeGroup'>";
html += "<div class='rte editor dropdown-label' style='float:left;'><i class='fa fa-fw fa-text-height'></i></div>";
html += "<select class='rte dropdown editor' id='fontSize' title='Font Size' style='float:left;width:50px;'><i class='fa fa-fw fa-font'></i>";
html += "<option value='1' size='1'>1</option>";
html += "<option value='2' size='2'>2</option>";
html += "<option value='3' size='3'>3</option>";
html += "<option value='4' size='4'>4</option>";
html += "<option value='5' size='5'>5</option>";
html += "<option value='6' size='6'>6</option>";
html += "<option value='7' size='7'>7</option>";
html += "</select>";
html += "</div>"; 

//Font Color


html +="<div class='rte editor button-group' id='textColorGroup'>";
html +="<div class='rte editor dropdown-label' style='float:left;'><i class='fa fa-fw fa-pencil'></i></div>";
html +="<select class='rte dropdown editor' id='textColor' title='Text Color' style='float:left;width:50px;'><i class='fa fa-fw fa-font'></i>";
html += "<option value='#eb2538' data-textcolor='white' style='background-color: #eb2538; color: white;'>Scarlet</option>";
html += "<option value='#be1e2d' data-textcolor='white' style='background-color: #be1e2d; color: white;'>Crimson</option>";
html += "<option value='#eb25a2' data-textcolor='black' style='background-color: #eb25a2; color: black;'>Hot Pink</option>";
html += "<option value='#be1e9e' data-textcolor='black' style='background-color: #be1e9e; color: black;'>Violet</option>";
html += "<option value='#781363' data-textcolor='white' style='background-color: #781363; color: white;'>Plumb</option>";
html += "<option value='#5a25eb' data-textcolor='white' style='background-color: #5a25eb; color: white;'>Indigo</option>";
html += "<option value='#491ebe' data-textcolor='white' style='background-color: #491ebe; color: white;'>Royal Blue</option>";
html += "<option value='#2e1378' data-textcolor='white' style='background-color: #2e1378; color: white;'>Navy</option>";
html += "<option value='#25aceb' data-textcolor='black' style='background-color: #25aceb; color: black;'>Sky</option>";
html += "<option value='#1e79be' data-textcolor='white' style='background-color: #1e79be; color: white;'>Aqua</option>";
html += "<option value='#135178' data-textcolor='white' style='background-color: #135178; color: white;'>Deep Sea</option>";
html += "<option value='#25eb64' data-textcolor='black' style='background-color: #25eb64; color: black;'>Lime</option>";
html += "<option value='#1ebe6e' data-textcolor='black' style='background-color: #1ebe6e; color: black;'>Emerald</option>";
html += "<option value='#137858' data-textcolor='white' style='background-color: #137858; color: white;'>Forest</option>";
html += "<option value='#e8eb35' data-textcolor='black' style='background-color: #e8eb35; color: black;'>Lemon</option>";
html += "<option value='#d1be17' data-textcolor='white' style='background-color: #d1be17; color: white;'>Mustard</option>";
html += "<option value='#787813' data-textcolor='white' style='background-color: #787813; color: white;'>Olive</option>";
html += "<option value='#eb6725' data-textcolor='black' style='background-color: #eb6725; color: black;'>Carrot</option>";
html += "<option value='#be511e' data-textcolor='white' style='background-color: #be511e; color: white;'>Pumpkin</option>";
html += "<option value='#57391e' data-textcolor='white' style='background-color: #57391e; color: white;'>Chocolate</option>";
html += "<option value='#ffffff' data-textcolor='black' style='background-color: #ffffff; color: black;'>White</option>";
html += "<option value='#ebebeb' data-textcolor='black' style='background-color: #ebebeb; color: black;'>Plaster</option>";
html += "<option value='#bebebe' data-textcolor='black' style='background-color: #bebebe; color: black;'>Concrete</option>";
html += "<option value='#787878' data-textcolor='white' style='background-color: #787878; color: white;'>Asphalt</option>";
html += "<option value='#000000' data-textcolor='white' style='background-color: #000000; color: white;'>Black</option>";
html += "<option value='CUSTOM' style='background-color: white'>CUSTOM</option>";
html += "</select>";
html +="</div>";



    //<!-- Inline Styles -->
    html +="<div class='rte editor button-group' id='inlineStyleGroup'>";
    //<!-- Bold -->
    html +="<a class='rte button editor' id='bold' title='Bold' data-role='bold' href='javascript:void(0)' ><i class='fa fa-fw fa-bold'></i></a>";
    //<!-- Italicize -->
    html +="<a class='rte button editor' id='italic' title='Italicize' data-role='italic' href='javascript:void(0)'><i class='fa fa-fw fa-italic'></i></a>";
    //<!-- Underline -->
    html +="<a class='rte button editor' id='underline' title='Underline' data-role='underline' href='javascript:void(0)'><i class='fa fa-fw fa-underline'></i></a>";
    //<!-- Strikethrough -->
    html +="<a class='rte button editor' id='strikethrough' title='Strikethrough' data-role='strikeThrough' href='javascript:void(0)'><i class='fa fa-fw fa-strikethrough'></i></a>";
    html +="</div>";

//<!-- Alignment -->
    html +="<div class='button-group' id='alignmentGroup'>";
    //<!-- Align Left -->
    html +="<a class='rte button editor' id='left' title='Left-align' data-role='justifyLeft' href='javascript:void(0)'><i class='fa fa-fw fa-align-left'></i></a>";
    //<!-- Align Center -->
    html +="<a class='rte button editor' id='center' title='Center-align' data-role='justifyCenter' href='javascript:void(0)'><i class='fa fa-fw fa-align-center'></i></a>";
    //<!-- Align Right -->
    html +="<a class='rte button editor' id='right' title='Right-align' data-role='justifyRight' href='javascript:void(0)'><i class='fa fa-fw fa-align-right'></i></a>";
    //<!-- Justify -->
    html +="<a class='rte button editor' id='justify' title='Justify' data-role='justifyFull' href='javascript:void(0)'><i class='fa fa-fw fa-align-justify'></i></a>";
    html +="</div>";

//<!-- Lists -->
    html +="<div class='button-group' id='listsGroup'>";
   // <!-- Unordered List -->
    html +="<a class='rte button editor' id='unordered' title='Bulleted List' data-role='insertUnorderedList' href='javascript:void(0)'><i class='fa fa-fw fa-list-ul'></i></a>";
    //<!-- Ordered List -->
    html +="<a class='rte button editor' id='ordered' title='Numbered List' data-role='insertOrderedList' href='javascript:void(0)'><i class='fa fa-fw fa-list-ol'></i></a>";			
    html +="</div>";


    