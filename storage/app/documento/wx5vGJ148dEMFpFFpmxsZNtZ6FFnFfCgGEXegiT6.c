#include <stdio.h>
#include <math.h>
#define int1 180//intervalo de alfa
#define int2 40//intervalo de v

int main(){
  int i;
  double alfa, m, va, fn, k, vw;
  double h1alfa[8], h1v[8], h2alfa[26], h2v[26];
  for (i=1;i<=8;i++){
    h1alfa[i-1]=(int1/(double)8)*(double)i;
    h1v[i-1]=(int1/(double)8)*(double)i;
  }

  for (i=1;i<=26;i++){
    h2alfa[i-1]=(int1/(double)26)*(double)i;
    h2v[i-1]=(int2/26)*(double)i;
  }

  
  fn=((m*va)-((m*vw)*cos(alfa))+(k*(m*va)))/(m+k);


  
  return 0;
}