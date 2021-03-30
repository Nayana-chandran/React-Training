function printFibanocci(num) {
  var num1 = 0;
  var num2 = 1;
  var sum;

  for (i=0; i<num ; i++) {
    sum = num1 +num2;
    num1 = num2;
    num2 = sum;
  }
  console.log('Next fibanocci is', num2);
}

printFibanocci(5); // Returns -> "Next fibanocci is", 8
