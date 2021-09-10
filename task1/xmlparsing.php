<?php
/**
 * The Xmlparsing class defines the `GetInstance` method that serves as an
 * alternative to constructor and lets clients access the same instance of this
 * class over and over.
 */
class Xmlparsing
{
    /**
     * The Xmlparsing's instance is stored in a static field. This field is an
     * array, because we'll allow our Xmlparsing to have subclasses. Each item in
     * this array will be an instance of a specific Xmlparsing's subclass. 
     */
    private static $instances = [];

    /**
     * The Xmlparsing's constructor should always be private to prevent direct
     * construction calls with the `new` operator.
     */
    protected function __construct() { }

    /**
     * Xmlparsings should not be cloneable.
     */
    protected function __clone() { }

    /**
     * Xmlparsings should not be restorable from strings.
     */
    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a Xmlparsing.");
    }

    /**
     * This is the static method that controls the access to the Xmlparsing
     * instance. On the first run, it creates a Xmlparsing object and places it
     * into the static field. On subsequent runs, it returns the client existing
     * object stored in the static field.
     *
     * This implementation lets you subclass the Xmlparsing class while keeping
     * just one instance of each subclass around.
     */
    public static function getInstance(): Xmlparsing
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }

    /**
     * doParsing function Parse out the ‘BetAmount’ property of BetInfo, and fill it into an array, return a total sum of all BetAmount
     * properties found
     * executed on its instance.
     */
    public function doParsing()
    {
        $example = 
			"<?xml version='1.0' encoding='UTF-8'?>
			<Reply>
			<Header></Header>
			<Param>
				<Method>cGetBetHistory</Method>
				<ErrorCode>0</ErrorCode>
				<MerchantID>1235</MerchantID>
				<MessageID>H110830134512K9n12</MessageID>
				<TotalRecord>1</TotalRecord>
				<ErrorDesc></ErrorDesc>
				<BetInfo>
					<No>2</No>
					<UserID>Player_1313455</UserID>
					<BetTime>08/15/2011 09:37:48</BetTime>
					<BalanceTime>08/15/2011 09:38:31</BalanceTime>
					<ProductID>Baccarat</ProductID>
					<GameInterface>3DView</GameInterface>
					<BetID>a2e3f40b-acae4c58aae8fbd4f755b694</BetID>
					<BetType>Single</BetType>
					<BetAmount>10000</BetAmount>
					<WinLoss>0</WinLoss>
					<BetResult>Loss</BetResult>
					<BetArrays>
						<BetInfo></BetInfo>
					</BetArrays>
					<No>3</No>
					<Bet></Bet>
					<GameID>98</GameID>
					<SubBetType>Player</SubBetType>
					<GameResult>P CLUB A DIAMOND A SPADE 9 ,B DIAMOND 3 CLUB 9 DIAMOND 6</GameResult>
					<WinningBet>Banker</WinningBet>
					<TableID>Baccarat_1</TableID>
					<DealerID>6</DealerID>
					<UserID>Player_1313455</UserID>
					<BetTime>08/15/2011 09:44:48</BetTime>
					<BalanceTime>08/15/2011 09:45:01</BalanceTime>
					<ProductID>Roulette</ProductID>
					<GameInterface></GameInterface>
					<BetID>86791c28-dbb2-4103-a7e8-f1c206bb417d</BetID>
					<BetType>Single</BetType>
					<BetAmount>100000</BetAmount>
					<WinLoss>0</WinLoss>
					<BetResult>Loss</BetResult>
					<BetArrays></BetArrays>
				</BetInfo>	
				<Bet></Bet>
				<GameID>R11306251387</GameID>
				<SubBetType>Red</SubBetType>
				<GameResult>32</GameResult>
				<WinningBet>32, Red, 19-36</WinningBet>
				<TableID>Roulette 1</TableID>
				<DealerID>6</DealerID>
			</Param>
			</Reply>";
		try{
			$xmldata			=	simplexml_load_string($example) or die("Error: Cannot create object");
			$betAmountxml		=	$xmldata->Param->BetInfo->BetAmount;
			$betAmountArray 	= 	json_decode(json_encode((array)$betAmountxml), TRUE);
			$sumBetamount		=	array_sum($betAmountArray);
			return $sumBetamount;
		} catch (\Exception $e){
			die('Error: '.$e->getMessage());
		}
    }
}