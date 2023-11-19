<?php
    $name = "Trần Văn Thịnh\n";
    $introduceSelfScript = 
    "Tôi là Trần Văn Thịnh, một sinh viên đến từ Trường Bách Khoa Đà Nẵng với chuyên ngành là Công Nghệ Thông Tin. Tôi luôn đam mê và hứng thú với lĩnh vực này, với niềm đam mê không ngừng nghỉ để tìm hiểu và phát triển sự am hiểu về công nghệ thông tin.
Trong thời gian học tập tại trường, tôi đã có cơ hội tiếp xúc với nhiều khía cạnh của ngành công nghệ thông tin, từ lập trình, phân tích dữ liệu, đến thiết kế ứng dụng và quản lý dự án. Tôi luôn cố gắng hoàn thiện kỹ năng kỹ thuật của mình để có thể đóng góp vào việc phát triển các sản phẩm và dịch vụ công nghệ thông tin tiên tiến hơn.
Ngoài ra, tôi cũng rất hứng thú với việc học hỏi và chia sẻ kiến thức với cộng đồng. Tôi tin rằng thông qua sự hợp tác và chia sẻ kiến thức, chúng ta có thể đạt được nhiều thành tựu lớn lao hơn trong lĩnh vực này.
Ngoài việc học tập và làm việc với công nghệ thông tin, tôi còn có những sở thích cá nhân khác như du lịch, đọc sách và thể thao. Tôi hy vọng có thể kết nối với các bạn có cùng đam mê và mục tiêu để cùng nhau xây dựng tương lai sáng sủa trong ngành công nghệ thông tin.";

    $myfile = fopen("myprofile.txt", "w") or die("Unable to open file!");
    
    fwrite($myfile, $name);
    fwrite($myfile, $introduceSelfScript);
    fclose($myfile);

    ////////////////////////////////////////////////////////

    $file = fopen("info.csv","r");
    echo '<table border="1">';
    while(!feof($file))
    {
        $data = fgetcsv($file);
        echo '<tr>';
        foreach ($data as $value) {
            echo '<td>' . $value . '</td>' ;
        }
        echo '</tr>';
    }
    echo '</table>';
    fclose($file);
