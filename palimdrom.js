function isPalindrome(data) {
  var isPalim = true;
  var len = data.length;
  for(i=0; i< len/2 ; i++ ) {
    if(data[i] !==  data[len - 1 - i]) {
      isPalim = false;
    }
  }

  if(isPalim) {
    console.log('Yes this is a palindrome');
  } else {
    console.log('No, it is not palindrome');
  }
}

isPalindrome('amma');  // Returns  -> Yes this is a palindrome
isPalindrome('amj2ma');  // Returns  -> No, it is not palindrome
isPalindrome('amgma');  // Returns  -> Yes this is a palindrome
isPalindrome('amjgma');  // Returns  -> No, it is not palindrome
