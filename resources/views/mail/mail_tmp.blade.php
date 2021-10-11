<style>
    *{direction: rtl}
</style>
<table  cellpadding="0" cellspacing="0" width="600"
        style="border:2px #f2f2f2 solid;margin: auto;    border-radius: 25px;direction: rtl">
    <tbody>
    <tr>
        <td valign="top"  align="center">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" align="center">
                <tbody>
                <tr>
                    <td valign="middle" style="padding:20px 0px 15px 0px" align="center">
                        <a href="{{url('/')}}"
                           target="_blank">
                            <img
                                    src="{{asset('images/logo.jpg')}}"
                                    alt=""
                                    style="width:50%" align="center" height="auto" class="CToWUd">
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td bgcolor="#FFFFFF" style="vertical-align:top;color:#282830;text-align: center;
        font-weight:400;line-height:30px;font-size:26px;padding:10px 8px 0px 8px">

            <h3>طلب تواصل </h3>
            <hr/>

        </td>
    </tr>


    <tr>
        <td bgcolor="#FFFFFF" style="vertical-align:top;">
            <div style="color:#282830;font-weight:700;line-height:24px;font-size:16px;padding:5px 10px;text-align: right;">
                المرسل:  &nbsp;{{$name}}
            </div>
        </td>
    </tr>

    <tr>
        <td bgcolor="#FFFFFF" style="vertical-align:top;">
            <div style="color:#282830;font-weight:700;line-height:24px;font-size:16px;padding:5px 10px;text-align: right;">
                التاريخ:     &nbsp;  &nbsp;      {{date("Y/m/d")}}
            </div>
        </td>
    </tr>

    <tr>
        <td bgcolor="#FFFFFF" style="vertical-align:top;">
            <div style="color:#282830;font-weight:700;line-height:24px;font-size:16px;padding:5px 10px;text-align: right;">
                الرسالة : <br/>
            </div>
            <div style="color:#33353d;font-weight:400;line-height:24px;font-size:16px;padding:10px 10px;text-align: right;">
                {{$messages}}
            </div>

        </td>
    </tr>




    <tr>
        <td bgcolor="#F2F2F2" style="height:1px"></td>
    </tr>
    <tr>
        <td  style="vertical-align:top;padding:10px 8px 0px 8px;text-align: center;">
            <div style="color:#3e3e3e;font-weight:700;line-height:24px;font-size:14px;text-align:center;padding: 10px">
                {{$email}}
            </div>
        </td>

    </tr>

    </tbody>
</table>