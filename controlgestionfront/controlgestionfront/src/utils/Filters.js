const moneyConfig = { style: 'currency', currency: 'MXN' };

export const Money = (number) => new Intl.NumberFormat('es-MX', moneyConfig).format(number);
