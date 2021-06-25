###Setup
  1. gitbash https://git-scm.com/downloads
  2. xampp: giúp ta cài database mysql, apache, php. https://www.apachefriends.org/download.html
  3. composer: giúp bản quản lý thư viện giống với maven, nuget, npm.  
    https://getcomposer.org/Composer-Setup.exe
  4. composer -> install laravel
    `composer global require laravel/installer`
  5. Tạo project laravel.
    - Chuột phải -> Git bash here tại thư mục muốn tạo project.
      `laravel new ten-cua-project`
      
###Editor

  - PHP Storm (visual studio code, sublime text, webstorm): webstorm -> php storm -> intellij IDEA
    - File > Open trỏ đến `thư mục chứa project` (nhìn thấy được thư mục app)

###Terminal
  - Điều hướng
    - `cd ten-thu-muc` đi vào trong một thư mục.
    - `cd ..` đi ra ngoài một thư mục.
    - `cd ~` đi ra ngoài thư mục gốc.
    - `cd ~/Desktop` đi ra ngoài thư mục desktop.
  - Xoá nội dung trong terminal.
    - `cls` (windows)
    - `clear` (macos hoặc linux)
  - Tạo một thư mục
    - mkdir (make directory)
  - Khi gõ lệnh cần chủ động ấn Tab để terminal tự động hoàn thiện nốt câu lệnh.  
    
###Cấu trúc thư mục trong project laravel.
  - `app` chứa code php core hay cơ bản là những controller, entity, class php hỗ trợ trong quá trình 
    xây dựng project.
    - `app/Http/Controllers` chứa controller.
    - `app/Models` chứa entity (mapping với database như Product, Order, Customer) và model liên quan.
  - `resources/views` thư mục default chứa view của project, những file html quan trọng ở đây, có đuôi
    là `.blade.php` <- view engine chúng ta sử dụng.
  - `routes` chứa thông tin mapping request người dùng với các controller tương ứng.
    - `web.php` cần làm việc với thằng này.
  - `database` chứa các thông tin làm việc với cơ sở dữ liệu từ việc tạo bảng (migration) 
     đến tạo seeding (tạo dữ liệu mẫu).
  - `config` chứa thông tin cấu hình project, từ việc kết nối database đến cache, log...
  - `.env` là một file đặc biệt quan trọng khi chạy project, chứa thông tin cấu hình cơ bản 
    (được ưu tiên trước config)
    nếu không có file này, project không chạy được. Phần lớn các trường hợp kéo trên git về
    thì không có file này do tính chất bảo mật.
     
    
###Các lệnh thông dụng trong laravel và một số thao tác cần biết.
  - `php artisan serve` : chạy project.
    - Một số trường hợp lấy project từ trên git về.
      - composer chưa update, update composer bằng lệnh `composer update` hoặc `composer install`.
      - chưa có application key, mở file .env để check.
        - Nếu chưa có, chạy câu lệnh sau để sinh key: `php artisan key:generate`
  - Ctrl + C: thoát chương trình đang chạy.
  - Ấn nút mũi tên lên, xuống để chạy lại những lệnh vừa chạy.  
  - Một số trường hợp yêu cầu nhập password thì trong terminal khi bạn gõ password sẽ không được hiển thị,
    không có dấu * hay bất kỳ dấu hiệu -> gõ, hoặc enter cho báo lỗi và gõ lại.
  - `php artisan make:controller TenController` Câu lệnh tạo controller. 
    Lưu ý phần tên luôn viết hoa chữ cái đầu.
    
###Routing.
  - Cấu hình trong file `routes/web.php`.
  - Nếu mapping với console thì có thể hiêu đây là menu trong console. Mỗi lần người dùng
    nhập thông tin vào url và enter tương ứng với việc người dùng chọn 1, 2, 3 trong menu console.
    Cơ chế routing sẽ giúp laravel tìm được một function tương ứng để callback.
  - Cơ chế routing phụ thuộc vào
    - `method` (get, post, put, delete, patch...)
    - `link` (đường dẫn người dùng gõ trên trình duyệt),
    - `callback function` là function được gọi khi người dùng truy cập vào một đường dẫn tương ứng.
  - Callback function.
    - Có thể trả về đơn giản là text `return 'Hello world'`.
    - Có thể trả về một view `return view('ten-view')` 
      (laravel sẽ tự động tìm đến thư mục `resources/views` và tìm tên view tương ứng. Bỏ đuổi .blade.php)
    - `redirect` Có thể điều hướng người dùng sang một trang khác.  
  - Để project dễ quản lý hơn, thì chúng ta không định nghĩa function trong file `web.php` 
    mà thường khai báo thành các `controller` và các hàm tương ứng.
  - Sử dụng class Route trong package `Illuminate\Support\Facades\Route;`

###Controller.
  - Tạo controller.
    - Vào thư mục `app/Http/Controllers/`, tạo file `TenController.php` và phải là một php class
    extend từ `Controller`.
    - Chạy câu lệnh `php artisan make:controller TenController`, sẽ giúp tạo một controller với tên tương
    ứng mà không cần phải copy thêm code.
    
###View.
  - Sử dụng engine blade `.blade.php`.
  - Default các view nằm trong thư mục `resources/views` với đuôi mở rộng là `.blade.php`
  - View cho phép kết hợp code html, css, js với code php.
  - Có cơ chế để cho các câu lệnh php, if else, for, do while vào.
  - Có cơ chế để xây dựng layout cho project.

###Xử lý dữ liệu client gửi lên trong controller, các phương pháp lấy dữ liệu gửi lên.
  - Lấy dữ liệu gửi lên trong form thì cần lưu ý.
    - Form muốn gửi lên được phải `@csrf`.
    - Để lấy dữ liệu gửi lên từ form. Trong callback function sử dụng thêm tham số
    `Request` (`Illuminate\Http\Request`) dùng hàm get để lấy ra tham số theo tên.
      
          function functionName(Request $request){
            $firstName = $request->get('firstname');
            $lastName = $request->get('lastname');
            $country = $request->get('country');
          }
  - Lấy dữ liệu trong query string (tham số gửi trên url). Trong callback function sử dụng thêm tham số
    `Request` (`Illuminate\Http\Request`) dùng hàm get để lấy ra tham số theo tên giống như lấy ra ở form.
    - Ví dụ về query string: `http://localhost:8000/users/login?name=hung&email=hung@gmail&password=123&gender=1`
    - Tham số đầu tiên bắt đầu bằng dấu `?`, từ tham số thứ 2 thì là `&`.
  - Gửi dữ liệu thông qua `path variable`, khi khai báo link thì thêm dấu `{ten-bien}`. Ví dụ.
    `/users/detail/{id}`, callback function để làm việc với biến này thì khai báo như sau (tham số
    truyền vào của callback trùng tên với tên biến.)
        
          public function getUserDetail($id){
             return 'Hello path ' . $id;
          }

###Gửi dữ liệu từ controller ra view và cách hiển thị variable ngoài view.
