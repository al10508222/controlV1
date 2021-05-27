<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \Maatwebsite\Excel\Sheet;

class ExcelStyleMacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Sheet::macro('styleCells', function (Sheet $sheet, string $cellRange, array $style) {
            $sheet->getDelegate()->getStyle($cellRange)->applyFromArray($style);
        });

        Sheet::macro('autoFilter', function (Sheet $sheet, string $cellRange) {
            $sheet->getDelegate()->setAutoFilter($cellRange);
        });

        Sheet::macro('rowHeight', function (Sheet $sheet, string $row, int $height) {
            $sheet->getDelegate()->getRowDimension($row)->setRowHeight($height);
        });

        Sheet::macro('wrapText', function (Sheet $sheet, string $cellRange) {
            $sheet->getDelegate()->getStyle($cellRange)->getAlignment()->setWrapText(true);
        });

        Sheet::macro('setAutoSize', function (Sheet $sheet) {
            $sheet->getDelegate()->getDefaultColumnDimension()->setAutoSize(true);
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
