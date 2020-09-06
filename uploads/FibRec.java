import java.util.Scanner;

public class FibRec
 {
public static void main(String[] args)
    {
        Scanner in=new Scanner(System.in);
System.out.println("Enter the range : ");
int n = in.nextInt();
if(fib(n)!=-1)
	for(int i=1;i<=n;i++)
	{
System.out.print(fib(i)+",");
	}
else
System.out.println("Enter a correct range");
}
public static int fib(int n)
{
if(n<0)
return -1;
else if(n==1||n==2)
return (n-1);
else
return(fib(n-1)+fib(n-2));
}
}
