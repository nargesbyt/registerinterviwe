<!DOCTYPE html>
<html>

<head>
    <title>لیست مصاحبه ها</title>
</head>

<body dir=rtl>
    <h1>لیست مصاحبه ها</h1>
    <table style="border: 1px solid black;">
        <thead>
            <tr>
                <th>تاریخ مصاحبه</th>
                <th>ساعت شروع مصاحبه</th>
                <th>سمت </th>
                <th>نام</th>
                <th>نام خانوادگی</th>
                <th>تحصیلات</th>
                <th>دانشگاه</th>
                <th>سن</th>
                <th>محل زندگی </th>
                <th>تاهل</th>
                <th>تعداد فرزندان</th>
                <th>کاربری کامپیوتر</th>
                <th>شماره تلفن</th>
                <th>سابقه کاری</th>
                <th>شغل پدر</th>
                <th>دلیل نیاز به کار</th>
                <th>کارآموزی</th>
                <th>اسم زومیلا را قبلا شنیده</th>
                <th>دوستی داشته که در زومیلا کار کنه</th>
                <th>چطور تا سر کار میاد</th>
                <th>اوقات فراغت</th>
                <th>آخرین بار که کتاب خوانده وچه کتابی</th>
                <th>درون گرا یا برون گرا</th>
                <th>پوشش</th>
                <th>محل آگهی کار</th>
                <th>سطح زبان انگلیسی</th>
                <th>قصد مهاجرت</th>
                <th>نتیجه نهایی و امتیاز</th>
            </tr>
        </thead>
        <?php $__currentLoopData = $interviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interview): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['inteviewDate']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['inteviewTime']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['careerFieldId']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['firstname']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['lastname']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['education']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['university']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['age']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['address']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['maritalStatus']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['childNum']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['computerSkill']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['phoneNum']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['employmentHistory']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['fatherJob']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['reasonForJob']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['internship']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['knowAboutUs']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['haveFriendHere']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['wayToCome']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['lastReadBook']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['characterType']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['coverType']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['employmentAdv']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['englishLevel']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['migrationIntention']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['interviewResult']); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <br><br>

    <a href="/interview/create">افزودن مصاحبه</a>
</body>

</html><?php /**PATH C:\Users\zoomila\registerinterviwe\resources\views/interviews/index.blade.php ENDPATH**/ ?>