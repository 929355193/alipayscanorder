Public Class Form1
    Private Sub Timer1_Tick(sender As Object, e As EventArgs) Handles Timer1.Tick
        '初始化提示
        Timer1.Enabled = False
        MsgBox("请务必使用扫码登录")
        MsgBox("低端电脑卡死正常,显示分辨率最低要求1200*650")
        MsgBox("安全问题自行承担")
        MsgBox("本程序注重结果，过程的代码没有优化")
        'If My.Computer.FileSystem.FileExists(Application.StartupPath + "\scan.txt") Then
        ' TextBox1.Text = IO.File.ReadAllText(Application.StartupPath + "\scan.txt")
        '  Else
        ' MsgBox("找不到以往的数据记录，准备生成新数据文件")
        ' IO.File.CreateText(Application.StartupPath + "\scan.txt")
        '  End If
        WebBrowser1.Navigate("https://consumeprod.alipay.com/record/standard.htm")
        Timer2.Enabled = True
    End Sub

    Private Sub Form1_Load(sender As Object, e As EventArgs) Handles MyBase.Load

    End Sub

    Private Sub Timer2_Tick(sender As Object, e As EventArgs) Handles Timer2.Tick
        '监控登录是否完毕
        Dim bbh As String = "20161018"
        Timer2.Enabled = False
        System.Threading.Thread.Sleep(500)
        Dim goodurl As String = "https://consumeprod.alipay.com/record/standard.htm"
        Dim nowurl As String = WebBrowser1.Url.ToString
        If goodurl = nowurl Then
            WebBrowser1.Visible = False
            System.Threading.Thread.Sleep(1500)
            Dim zfbuser As String = WebBrowser1.Document.Body.InnerHtml.ToString
            zfbuser = Split(zfbuser, "userName :")(1)
            zfbuser = Split(zfbuser, "email:")(0)
            zfbuser = Trim(zfbuser)
            zfbuser = Replace(zfbuser, "'", "")
            zfbuser = Replace(zfbuser, ",", "")

            Dim zfbid As String = WebBrowser1.Document.Body.InnerHtml.ToString
            zfbid = Split(zfbid, "email: ")(1)
            zfbid = Split(zfbid, "mobile:")(0)
            zfbid = Trim(zfbid)
            zfbid = Replace(zfbid, "'", "")
            zfbid = Replace(zfbid, ",", "")
            Me.Text = Me.Text + " | 版本：" + bbh + ">>>(" + zfbuser + zfbid + ")<<<"
            System.Threading.Thread.Sleep(500)
            Timer3.Enabled = True
            Button3.Enabled = True
        Else
            Timer2.Enabled = True
        End If

    End Sub

    Private Sub Button1_Click(sender As Object, e As EventArgs) Handles Button1.Click
        TextBox1.Text = WebBrowser1.Document.Body.InnerHtml
    End Sub

    Private Sub Timer3_Tick(sender As Object, e As EventArgs) Handles Timer3.Tick
        '核心区域
        Timer3.Enabled = False
        Dim jyh As String
        Dim je As String
        Dim all As String
        Dim jl As String
        Dim html001 As String = WebBrowser1.Document.Body.InnerHtml

        For i = 1 To 10


            '获取交易号开始
            jyh = html001
            jyh = Split(jyh, "data-clipboard-text=" & Chr(34))(1)
            jyh = Split(jyh, Chr(34) & ">")(0)
            jyh = Trim(jyh)
            '获取交易号结束

            '获取金额开始
            je = html001
            je = Split(je, "<span class=" & Chr(34) & "amount-pay" & Chr(34) & ">")(1)
            je = Split(je, "</span>")(0)
            je = Trim(je)
            je = Replace(je, " ", "")
            je = Replace(je, "+", "")
            je = Replace(je, "-", "")
            '获取金额结束

            '汇总写入列表框
            all = "[" + jyh + "]----[" + je + "]" + Chr(10)
            Dim cf As String = TextBox1.Text.Contains(all)
            If cf = False Then
                TextBox1.Text = all & TextBox1.Text
            End If

            '清除位置，防止重复
            jl = html001
            jl = Split(jl, "<tr class=")(1)
            jl = Split(jl, "</tr>")(0)
            jl = Trim(jl)
            jl = "<tr class=" + jl + "</tr>"
            html001 = Replace(html001, jl, "---ok---")
            System.Threading.Thread.Sleep(500)
        Next
        'My.Computer.FileSystem.WriteAllText(Application.StartupPath + "\scan.txt", TextBox1.Text, False, System.Text.Encoding.Default)
        WebBrowser1.Refresh()
        System.Threading.Thread.Sleep(3000)
        Timer3.Enabled = True
    End Sub

    Private Sub Label1_Click(sender As Object, e As EventArgs) Handles Label1.Click
        Process.Start("https://github.com/929355193/alipayscanorder")
    End Sub

    Private Sub Button2_Click(sender As Object, e As EventArgs) Handles Button2.Click
        'Process.Start(Application.StartupPath + "\scan.txt")
    End Sub

    Private Sub Timer4_Tick(sender As Object, e As EventArgs) Handles Timer4.Tick
        '上传接口服务
        WebBrowser2.Navigate(TextBox2.Text & "?" & TextBox3.Text & "=" & TextBox1.Text)

    End Sub

    Private Sub Button3_Click(sender As Object, e As EventArgs) Handles Button3.Click
        Button3.Enabled = False
        Button4.Enabled = True
        Timer4.Enabled = True
    End Sub

    Private Sub Button4_Click(sender As Object, e As EventArgs) Handles Button4.Click
        Button3.Enabled = True
        Button4.Enabled = False
        Timer4.Enabled = False
    End Sub
End Class
