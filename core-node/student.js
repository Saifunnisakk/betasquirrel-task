const getStudents = (input, callback) => {
  const students = [
    { name: 'saifunnisa', email: 'saifunnisakk313@gmail.com' },
    { name: 'amanali', email: 'aman@gmail.com' },
    { name: 'fahina', email: 'fahina@gmail.com' },
  ];
  callback(200, { message: '', data: students });
};

module.exports = getStudents;
