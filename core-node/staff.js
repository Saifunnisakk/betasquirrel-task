const getStaffs = (input, callback) => {
  const staff = [
    { name: 'muhammed', email: 'muhammed@gmail.com' },
    { name: 'femin', email: 'femin.com' },
    { name: 'arun', email: 'arun@gmail.com' },
  ];
  callback(200, { message: '', data: staff });
};

module.exports = getStaffs;
