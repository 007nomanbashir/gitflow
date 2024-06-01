<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Company Name</title>
</head>
<body bgcolor="#0f3462" style="margin-top:20px;margin-bottom:20px">
  <!-- Main table -->
  <table border="0" align="center" cellspacing="0" cellpadding="0" bgcolor="white" width="650">
    <tr>
      <td>
        <!-- Child table -->
        <table border="0" cellspacing="0" cellpadding="0" style="color:#0f3462; font-family: sans-serif;">
          <tr>
            <td>
              <h2 style="text-align:center; margin: 0px; padding-bottom: 25px; margin-top: 25px;">
                <i>Laravel</i><span style="color:lightcoral">Assesment</span></h2>
            </td>
          </tr>
          <tr>
            <td style="text-align: center;">
              <h1 style="margin: 0px;padding-bottom: 25px; text-transform: uppercase;">This is our top post</h1>
              <h2 style="margin: 0px;padding-bottom: 25px;font-size:22px;"> Posted by {{$topPost->user->name}}</h2>
              <p style=" margin: 0px 40px;padding-bottom: 25px;line-height: 2; font-size: 15px;">
                {{$topPost->post}}
              </p>
             
              <h2 style="margin: 0px; padding-bottom: 25px;">{{$topPost->created_at->format('Y M D')}}</h2>
            </td>
          </tr>
        </table>
        <!-- /Child table -->
      </td>
    </tr>
  </table>
  <!-- / Main table -->
</body>
</html>