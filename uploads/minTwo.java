import java.util.Scanner;
class minTwo {

public static void sortInsertion(int [] sort_arr){

for(int i=0;i<sort_arr.length;++i){

int j = i;

while(j > 0 &&sort_arr[j-1]>sort_arr[j]){

int key = sort_arr[j];
sort_arr[j] = sort_arr[j-1];
sort_arr[j-1] = key;
                j = j-1;

            }
        }
    }

public static void main( String args[] )
    {
        Scanner in=new Scanner(System.in);
System.out.println("Enter the range : ");
int n=in.nextInt();
int[] arr=new int[n];
System.out.println("Enter the numbers");
for(int i=0;i<n;i++)
        {

arr[i]=in.nextInt();
        }
sortInsertion(arr);
System.out.println("Minimum number in array"+arr[0]);
System.out.println("Second minimum in array"+arr[1]);

}
}







